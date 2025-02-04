<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Jiraphorn Pangulpanich(ELF)</title>
</head>

<body>
<h1>Jiraphorn Pangulpanich(ELF)</h1>

<form method="post" action="">
price <input type="number" name="a" min="0"  autofocus required>
<input type="submit" name="Submit" value="Submit">
<!--button type="submit" name="Submit>Submit</button>-->
</form>
<hr>

<?php
	if(isset($_POST['Submit'])){
	$price = $_POST['a'];
		if($price>=5000){
			$discount = "0.15";
		}else if ($price>=2000){
			$discount = "0.1";
		}else if ($price>=1000){
			$discount = "0.05";
		}else{
			$discount = "0";
		}
	$net = $price * $discount;
    $totalPrice = $price - $net;

    echo "Price = " . number_format($price, 0) . " Baht<br><br>";
    echo "Discount = " . number_format($net, 0) . " Baht<br><br>";    
    echo "Total Price = " . number_format($totalPrice, 0) . " Baht";
	}
			
?>
</body>
</html>
