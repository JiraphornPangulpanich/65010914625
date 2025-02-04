<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jiraphorn pangulpanich(ELF)</title>
</head>

<body>
<h1>Jiraphorn Pangulpanich(ELF)</h1>

<form method="post" action="">
	แม่สูตรคูณ <input type="number" min="2" max="1000" name="a" required autofocus>
    <button type="submit" name="Submit">Submit</button>
</form> <hr>

<?php
if(isset($_POST['Submit'])){
	$m = $_POST['a'];
	for($i=1; $i<=12; $i++){
		$x = $m * $i ;
?>
	<?=$m;?> x <?=$i;?> = <?=$x;?> <br>
<?php 
	}
}
?>
</body>
</html>