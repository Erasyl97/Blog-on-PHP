<?php

include "connect_db.php";

	session_start();

	if(isset($_POST['login']) && isset($_POST['password'])){

		$sql_text = "SELECT * FROM admin WHERE login = \"".$_POST['login']."\" AND password = \"". sha1($_POST['password'])."\"";
		
		$query = $connection->query($sql_text);

		if($row = $query->fetch_object()){
			$_SESSION['admin'] = $row;
			header("Location:index.php?page=statistics");
		}else{
			header("Location:index.php");
		}
	}
	else{
		header("Location:index.php");
	}
	

?>