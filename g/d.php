<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jiraphorn pangulpanich(ELF)</title>
</head>

<body>
<h1>Jiraphorn Pangulpanich(ELF)</h1>

<form method="post" action="">
	Number <input type="number" min="1" max="1000" name="a" required autofocus>
    <button type="submit" name="Submit">Submit</button>
</form> <hr>

<?php
if(isset($_POST['Submit'])){
	$count = $_POST['a'];
	echo "แสดงจำนวน $count รูป <br><br>";
	for($i=1; $i<=$count; $i++){
?>
	<img src="4.jpg" width="200"> 
<?php 
	}
}
?>
</body>
</html>