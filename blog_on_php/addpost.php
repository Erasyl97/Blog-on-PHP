<?php  
include 'connect_db.php';

if(isset($_POST['theme']) && isset($_POST['post']) && isset($_POST['userid'])) {
	
	$sql_text = "
		INSERT INTO posts (id, userid, theme, post)
		VALUES (NULL, " . (int)$_POST['userid'] . ",\"" . $_POST['theme'] . "\", \"" . $_POST['post'] . "\")
	";
	$query = $connection->query($sql_text);
	header("Location:index.php");
}
else
{
	header("Location:index.php?page=profile.php");
}