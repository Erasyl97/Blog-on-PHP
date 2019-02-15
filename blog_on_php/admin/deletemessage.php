<?php
	include 'connect_db.php';

	if (isset($_POST['messageid'])) {

		$sqltext = "DELETE FROM messages WHERE id=" . $_POST['messageid'] . " ;" ;
		$query = $connection->query($sqltext);
		header("Location:index.php?page=messages");
		//echo $_POST['postid'];
	}
	else
	{
		header("Location:index.php?page=messages");
	}
?>