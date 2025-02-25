<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Insert Product</h1>
    <form method="post" action="">
    	Name Product
        <input type="text" name="pname" required autofocus><br><br>
        Price
        <input type="text" name="pprice" required autofocus><br><br>
        <button type="submit">Save</button>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
	include_once("../connectdb.php");
	$pname = $_POST['pname'];
	$pprice = $_POST['pprice'];
	$sql = "INSERT INTO products (p_name, p_price) VALUES ('{$pname}','{$pprice}')";
	mysqli_query($conn, $sql) or die ('insert error');
	
	echo "<script>";
	echo "alert('insert success');";
	echo "</script>";
}
?>
</body>
</html>