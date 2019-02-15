<?php
	include "connect_db.php";

	session_start();
	$user = $_SESSION['user'];
	$sql_text1 = "UPDATE users SET online = \"0\" WHERE id=" . $user->id . ";";
	$query1 = $connection->query($sql_text1);
	session_destroy();
	header('Location: index.php');
	exit;
	
?>