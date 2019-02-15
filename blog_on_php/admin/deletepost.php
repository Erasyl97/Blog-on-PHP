<?php
	include 'connect_db.php';

	if (isset($_POST['postid'])) {

		$sqltext = "DELETE FROM posts WHERE id=" . $_POST['postid'] . " ;" ;
		$query = $connection->query($sqltext);
		header("Location:index.php?page=posts");
		//echo $_POST['postid'];
	}
	else
	{
		header("Location:index.php?page=posts");
	}
?>