<!doctype html>
<?php
if(!empty($_GET['id'])){
	include_once("../connectdb.php");
	$sql = "DELETE FROM products WHERE p_id = '{$_GET['id']}' ";
	mysqli_query($conn, $sql) or die('Delete error');
	
	unlink("../images/{$_GET['id']}.{$_GET['ext']}");
	
	echo "<script>";
	echo "window.location='index.php';";
	echo "</script>";
}
?>