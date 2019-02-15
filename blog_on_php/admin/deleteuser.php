<?php
	include 'connect_db.php';

	if (isset($_POST['userid'])) {

		$sqltext = "DELETE FROM users WHERE id=" . $_POST['userid'] . " ;" ;
		$query = $connection->query($sqltext);
		header("Location:index.php?page=users");
		//echo $_POST['postid'];
	}
	else
	{
		header("Location:index.php?page=users");
	}
?>