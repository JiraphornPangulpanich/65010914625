<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Jiraphorn Pangulpanich(ELF)</title>
</head>

<body>
<h1>สมัครสมาชิกชมรมคนรักพระเครื่อง</h1>
    <form method="post" action="">
    		เพศ
  		  <input type="radio" name="sex" value="หญิง" checked>หญิง
    	  <input type="radio" name="title" value="ชาย">ชาย
    	  <br><br>
    	  ชื่อ-สกุล <input type="text" name="Name" required>
    	  <br><br>
    	  ที่อยู่ 
    	  <textarea name="address" cols="27" rows="4" required></textarea>
    	  <br><br>
    	  เบอร์โทรศัพท์ <input type="text" name="Number" max="10" required autofocus>
    	  <br><br>
          ระดับการศึกษา 
          <select name="education">
        	<option value="ปริญญาตรี">ปริญญาตรี</option>
            <option value="ปริญญาโท">ปริญญาโท</option>
            <option value="ปริญญาเอก">ปริญญาเอก</option></select>
          <br><br>
          รุ่นพระที่ชอบ
          	<input type="checkbox" name="amulet[]" value="หลวงปู่ไข่"/>หลวงปู่ไข่
          	<input type="checkbox" name="amulet[]" value="หลวงปู่คง"/>หลวงปู่คง
          	<input type="checkbox" name="amulet[]" value="หลวงพ่อคูณ"/>หลวงพ่อคูณ
          	<input type="checkbox" name="amulet[]" value="หลวงปู่โต๊ะ"/>หลวงปู่โค๊ะ
          	<input type="checkbox" name="amulet[]" value="หลวงพ่อยอด"/>หลวงพ่อยอด
          <br><br>
          Username <input type="text" name="username" required>
    	  <br><br>
          Password <input type="text" name="password" required>
    	  <br><br>   
          <button type="submit" name="Submit">ยืนยัน</button>
          <button type="reset">ยกลิก</button>
          <button type="button" onClick="window.print() ;">พิมพ์</button>
  	 </form>
     <hr>
<?php
if(isset($_POST['Submit'])){
	echo "เพศ: ".$_POST['sex']."<br>";
	echo "ชื่อ-สกุล: ".$_POST['Name']."<br>";
	echo "ที่อยู่: ".$_POST['address']."<br>";
	echo "เบอร์โทรศัพท์: ".$_POST['Number']."<br>";
	echo "ระดับการศึกษา: ".$_POST['education']."<br>";
	echo "รุ่นพระที่ชอบ: ";
if (isset($_POST['amulet'])) {
    foreach ($_POST['amulet'] as $amulet) {
        echo "<li>" . htmlspecialchars($amulet) . "</li>";
    }
}
	echo "Username: ".$_POST['username']."<br>";
	echo "Password: ".$_POST['password']."<br>";
}
?>
</body>
</html>