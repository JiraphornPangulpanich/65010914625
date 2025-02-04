<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Jiraphorn Pangulpanich(ELF)</title>
</head>

<body>
	<h1>Jiraphorn Pangulpanich(ELF)</h1>
    
    <form method="post" action="">
    	Number <input type="number" name="a"  min="0" max="100" required autofocus>
        <br><br>
        Name <input type="text" name="b" required>
        <br><br>
        Province 
        <select name="province">
        	<option value="Sukhothai">Sukhothai</option>
            <option value="Chiang Mai">Chiang Mai</option>
            <option value="Lampang">Lampang</option>
            <option value="Khon Kaen">Khon Kaen</option></select>
            <br><br>
            Date of birth
            <input type="date" name="birthday">
            <br><br>
        <button type="Submit">Submit</button>
    </form>
    <hr>
    <?php
	echo @$_POST['a']."<br>";
	echo @$_POST['b']."<br>";
	echo @$_POST['province']."<br>";
	echo @$_POST['birthday']."<br>";
	?>
</body>
</html>