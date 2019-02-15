<?php
	include 'connect_db.php';

	if (isset($_POST['fromid']) && isset($_POST['toid']) && isset($_POST['message'])) {

		$sqltext = "
		INSERT INTO messages (id, message, fromid, toid)
		VALUES (NULL,\"" . $_POST['message'] . "\", " . (int)$_POST['fromid'] . ", " . (int)$_POST['toid'] . " )";
		$query = $connection->query($sqltext);
		header("Location:index.php?page=bloggers");
		//$s = $_POST['toid'];
		//echo '<script type="text/javascript"> $.post(' . '/messages.php' .', {userid: \'' . $s . '\'}, function(result) {aler});</script>';
		
		
		
	}
	else
	{
		header("Location:index.php?page=profile.php");
	}
?>