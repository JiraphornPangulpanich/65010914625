<?php
$host = "localhost";
$user = "root";
$pwd = "qq123456";
$db = "shop4625";
$conn = mysqli_connect($host, $user, $pwd) or die ("No connect");
mysqli_select_db($conn, $db) or die ("No select database");
mysqli_query($conn, "set names utf8");

?>