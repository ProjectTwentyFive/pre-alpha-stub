<?php 
include_once("db.php");
$id = $_GET['id'];
$result = pg_query("DELETE FROM users WHERE id='$id'") or die('Query failed: ' . pg_last_error());
header("Location:users.php");
?>	