<?php

include "connect_db.php";

	session_start();

	if(isset($_POST['email'])&&isset($_POST['password'])){

		$sql_text = "SELECT * FROM users WHERE email = \"".$_POST['email']."\" AND password = \"". sha1($_POST['password'])."\"";
		
		$query = $connection->query($sql_text);
		if ($_POST['captcha']==$_POST['captchat']) {
			if($row = $query->fetch_object()){
			$_SESSION['user'] = $row;
			$sql_text1 = "UPDATE users SET online = \"1\" WHERE email = \"".$_POST['email']."\" AND password = \"". sha1($_POST['password'])."\"";
			$query1 = $connection->query($sql_text1);
			header("Location:index.php?page=profile");
			}else{
				header("Location:index.php");
			}
		}
		
	}
	else{
		header("Location:index.php");
	}
	

?>