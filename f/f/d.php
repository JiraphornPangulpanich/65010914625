<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Jiraphorn Pangulpanich(ELF)</title>
</head>

<body>
<h1>Jiraphorn Pangulpanich(ELF)</h1>

<form method="post" action="">
score <input type="number" name="Score" min="0" max="100" autofocus required>
<input type="submit" name="Submit" value="Submit">
<!--button type="submit" name="Submit>Submit</button>-->
</form>
<hr>

<?php
	if(isset($_POST['Submit'])){
	$score = $_POST['Score'];
		if($score>=80){
			$grade = "A";
		}else if ($score>=70){
			$grade = "B";
		}else if ($score>=60){
			$grade = "C";
		}else if ($score>=50){
			$grade = "D";
		}else{
			$grade = "F";
		}
	echo " score $score get grade $grade";
	}
			
?>


</body>
</html>
