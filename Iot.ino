#include <DHT.h>
#include <WiFi.h>
#include <WiFiManager.h> // ไลบรารี WiFiManager
#include <WiFiClientSecure.h>
#include <UniversalTelegramBot.h>
#include <BlynkSimpleEsp32.h>
#include <HTTPClient.h> // สำหรับ HTTPClient

#define DHTPIN 15
#define DHTTYPE DHT11
#define MQ3PIN 34
#define TRIGPIN 19
#define ECHOPIN 18


const char auth[] = "JGoIPW4aDWRWedUElEuEqtjTrSxup2pt";
const char* botToken = "8044148083:AAFnpNI8lPbXkc9jbYna4kzZC7E6CZrMZg4";
const char* chatID = "-4745975800";

DHT dht(DHTPIN, DHTTYPE);
WiFiClientSecure client;
UniversalTelegramBot bot(botToken, client);

float tempThreshold = 60.0;
float humidThreshold = 30.0;
int smokeThreshold = 1200;
float waterLevelThreshold = 20.0;

unsigned long objectDetectedStart = 0;
bool isTimerRunning = false;
unsigned long lastReconnectAttempt = 0; // เพิ่มตัวแปรนี้

// 🔹 Wi-Fi Setup
void setupWiFi() {
  WiFiManager wifiManager;
  wifiManager.autoConnect("wifismartsom");
  Serial.println("✅ Wi-Fi Connected!");
}

// 🔹 Callback Functions ของ Blynk
BLYNK_CONNECTED() {
  Serial.println("✅ Blynk connected!");
  Blynk.syncAll();
}

BLYNK_DISCONNECTED() {
  Serial.println("❌ Blynk disconnected!");
}

// 🔹 Reconnect Wi-Fi
void reconnectWiFi() {
  if (WiFi.status() != WL_CONNECTED) {
    Serial.println("🔄 Reconnecting Wi-Fi...");
    WiFiManager wifiManager;
    wifiManager.autoConnect("wifismartsom");
    Serial.println("✅ Wi-Fi Reconnected!");
  }
}

void resetWiFiSettings() {
  Serial.println("⚠️ ลบข้อมูล Wi-Fi...");
  WiFi.disconnect(true, true); // ลบข้อมูล Wi-Fi ที่เก็บไว้ในหน่วยความจำ
  delay(1000);
  ESP.restart(); // รีสตาร์ทบอร์ด
}

// เมื่อปุ่มใน Blynk ถูกกด
BLYNK_WRITE(V14) { // V0 คือ Virtual Pin ของปุ่มใน Blynk
  int value = param.asInt();
  if (value == 1) { // ถ้าปุ่มถูกกด (ค่าจะเป็น 1)
    Blynk.virtualWrite(V14, 0); // รีเซ็ตสถานะปุ่มกลับเป็น 0
    resetWiFiSettings();       // เรียกฟังก์ชันรีเซ็ต Wi-Fi
  }
}

// 🔹 Reconnect Blynk
void reconnectBlynk() {
  unsigned long now = millis();
  if (!Blynk.connected() && (now - lastReconnectAttempt > 10000)) {
    Serial.println("🔄 Blynk reconnecting...");
    if (Blynk.connect()) {
      Serial.println("✅ Blynk Reconnected!");
    } else {
      Serial.println("❌ Blynk reconnect failed.");
    }
    lastReconnectAttempt = now;
  }
}

String urlEncode(String str) {
  String encoded = "";
  for (int i = 0; i < str.length(); i++) {
    char c = str[i];
    if (isalnum(c)) {
      encoded += c;  // ตัวอักษรปกติไม่เปลี่ยนแปลง
    } else {
      encoded += "%" + String(c, HEX);  // เข้ารหัสตัวอักษรพิเศษ
    }
  }
  return encoded;
}

// 🔹 ส่งข้อความไปยัง Telegram
void sendTelegramMessage(String message) {
  HTTPClient http;

  // เข้ารหัสข้อความ
  String encodedMessage = urlEncode(message);

  // สร้าง URL
  String url = "https://api.telegram.org/bot" + String(botToken) +
               "/sendMessage?chat_id=" + String(chatID) +
               "&text=" + encodedMessage;

  Serial.println("Generated URL: " + url); // พิมพ์ URL ออกทาง Serial
  http.begin(url);
  int httpResponseCode = http.GET();

  Serial.print("📡 HTTP Response Code: ");
  Serial.println(httpResponseCode);

  if (httpResponseCode > 0) {
    Serial.println("✅ ส่งข้อความ Telegram สำเร็จ!");
    String response = http.getString();
    Serial.println("📨 Response: " + response);
  } else {
    Serial.print("❌ ส่งข้อความ Telegram ล้มเหลว: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}


void setup() {
  Serial.begin(115200);
  dht.begin();
  pinMode(TRIGPIN, OUTPUT);
  pinMode(ECHOPIN, INPUT);

  setupWiFi();
  Blynk.begin(auth, WiFi.SSID().c_str(), WiFi.psk().c_str(), "iotservices.thddns.net", 5535);

  client.setInsecure();
  if (client.connect("api.telegram.org", 443)) {
    Serial.println("✅ Connected to Telegram API");
  }
}


BLYNK_WRITE(V4) { tempThreshold = param.asFloat(); }      // Slider for Temperature
BLYNK_WRITE(V5) { humidThreshold = param.asFloat(); }    // Slider for Humidity
BLYNK_WRITE(V6) { smokeThreshold = param.asInt(); }      // Slider for Smoke
BLYNK_WRITE(V7) { waterLevelThreshold = param.asFloat(); } // Slider for Water Level

void loop() {
  Blynk.run();

  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();
  int smokeLevel = analogRead(MQ3PIN);
  long duration;
  float distance;

  digitalWrite(TRIGPIN, LOW);
  delayMicroseconds(2);
  digitalWrite(TRIGPIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIGPIN, LOW);

  duration = pulseIn(ECHOPIN, HIGH);
  distance = (duration * 0.034) / 2;

  Serial.print("Temperature: ");
  Serial.print(temperature);
  Serial.print(" °C, Humidity: ");
  Serial.print(humidity);
  Serial.print(" %, Smoke Level: ");
  Serial.print(smokeLevel);
  Serial.print(", Water Level Distance: ");
  Serial.print(distance);
  Serial.println(" cm");

  Blynk.virtualWrite(V0, temperature);
  Blynk.virtualWrite(V1, humidity);
  Blynk.virtualWrite(V2, smokeLevel);
  Blynk.virtualWrite(V3, distance);
  Blynk.virtualWrite(V8, tempThreshold); // Show current Temperature threshold
  Blynk.virtualWrite(V9, humidThreshold); // Show current Humidity threshold
  Blynk.virtualWrite(V10, smokeThreshold); // Show current Smoke threshold
  Blynk.virtualWrite(V11, waterLevelThreshold); // Show current Water Level threshold

  if (distance < waterLevelThreshold) {
    if (!isTimerRunning) {
      objectDetectedStart = millis();
      isTimerRunning = true;
    } else if (millis() - objectDetectedStart >= 5000) {
      sendTelegramMessage("Warning: 🌊Water Level High!");
      objectDetectedStart = millis();
    }
  } else {
    isTimerRunning = false;
  }

  if (temperature > tempThreshold && smokeLevel > smokeThreshold && humidity < humidThreshold) {
    String message = "Warning: 🔥High Temperature, 🌫️Smoke Detected, and 💧Low Humidity!";
    Serial.println(message);
    sendTelegramMessage(message);
  } else if (temperature > tempThreshold && smokeLevel > smokeThreshold) {
    String message = "Warning: 🔥High Temperature and 🌫️Smoke Detected!";
    Serial.println(message);
    sendTelegramMessage(message);
  } else if (temperature > tempThreshold && humidity < humidThreshold) {
    String message = "Warning: 🔥High Temperature and 💧Low Humidity!";
    Serial.println(message);
    sendTelegramMessage(message);
  } else if (smokeLevel > smokeThreshold && humidity < humidThreshold) {
    String message = "Warning: 🌫️Smoke Detected and 💧Low Humidity!";
    Serial.println(message);
    sendTelegramMessage(message);
  } else if (temperature > tempThreshold) {
    String message = "Warning: 🔥High Temperature!";
    Serial.println(message);
    sendTelegramMessage(message);
  } else if (smokeLevel > smokeThreshold) {
    String message = "Warning: 🌫️Smoke Detected!";
    Serial.println(message);
    sendTelegramMessage(message);
  } else if (humidity < humidThreshold) {
    String message = "Warning: 💧Low Humidity!";
    Serial.println(message);
    sendTelegramMessage(message);
  }

  delay(1000);
}
