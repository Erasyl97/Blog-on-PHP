<?php

	include 'connect_db.php';

	if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password2'])&&isset($_POST['name'])&&isset($_POST['surname'])){

		if($_POST['password']==$_POST['password2']){

			$sql_text = "SELECT * FROM users WHERE email = \"".$_POST['email']."\" AND password = \"".$_POST['password']."\"";
		
			$query = $connection->query($sql_text);

			if($row = $query->fetch_object()){

				header("Location:index.php");

			}else{

				$sql_text = "
					INSERT INTO users (id,email,password,name, surname)
					VALUES (NULL, \"".$_POST['email']."\", \"". sha1($_POST['password'])."\", \"".$_POST['name']."\", \"".$_POST['surname']."\")
				";
				$query = $connection->query($sql_text);

				header("Location:index.php?page=profile.php");
			}


		}else{
			header("Location:index.php");
		}

	}else{
		header("Location:index.php");
	}

?>