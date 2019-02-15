<?php
session_start();

include_once 'connect_db.php';

$page = "login_forms";
if (isset($_SESSION['admin'])) {
	$admin = $_SESSION['admin'];

	if(isset($_GET["page"])){
		if ($_GET["page"] == "statistics") {
			$page = "statistics";
		}
		elseif ($_GET["page"] == "users") {
			$page = "users";
		}elseif ($_GET["page"] == "posts") {
			$page = "posts";
		}elseif ($_GET["page"] == "messages") {
			$page = "messages";
		}
		else{
			$page = "404";
		}
	}else{
		$page = "statistics";
	}
} 
else {
	$page = "login_forms";
}



?>

<!doctype hmtl>
<html>
<head>
	<title>Home page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
		body {
		  font-family: "Lato", sans-serif;
		}

		.sidenav {
		  height: 100%;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #111;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		.header {
			background-color: #111;
		}
	</style>
</head>
<body>
<header class="header">
	<table style="width: 100%">
		<tr>
			<td style="width: 33%; color: #B9B9B9"><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span></td>
			<td style="width: 34%; color: #B9B9B9"><h1 style="text-align: center;">Admin Page</h1></td>
			<td style="width: 33%;"><h1 style="text-align: right;"><strong><a href="exit.php" style="color: #B9B9B9">Exit</a></strong></h1></td>
		</tr>
	</table>
</header>
<?php include ''.$page.'.php'  ?>
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="?page=statistics">Statistics</a>
	  <a href="?page=users">Users</a>
	  <a href="?page=posts">Posts</a>
	  <a href="?page=messages">Messages</a>
	</div>

	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	}
	</script>



</body>
</html>