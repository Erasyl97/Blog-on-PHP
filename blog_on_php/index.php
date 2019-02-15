<?php

session_start();

include_once 'connect_db.php';

$page = "auth-forms";
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];

	if(isset($_GET["page"])){

		if($_GET["page"] == "profile"){
			$page = "profile";
		}else if($_GET["page"] == "edit"){
			$page = "edit";
		}elseif ($_GET["page"] == "newpost") {
			$page = "newpost";
		}
		elseif ($_GET["page"] == "allposts") {
			$page = "allposts";
		}
		elseif ($_GET["page"] == "userprofile") {
			$page = "userprofile";
		}
		elseif ($_GET["page"] == "bloggers") {
			$page = "bloggers";
		}
		elseif ($_GET["page"] == "messages") {
			$page = "messages";
		}
		elseif ($_GET["page"] == "profilekaz") {
			$page = "profilekaz";
		}
		elseif ($_GET["page"] == "profilerus") {
			$page = "profilerus";
		}
		elseif ($_GET["page"] == "calendar1") {
			$page = "calendar1";
		}
		else{
			$page = "404";
		}
	}else{
		$page = "profile";
	}
}else{
	$page = "auth-forms";
}



?>

<!doctype hmtl>
<html>
<head>
	<title>Home page</title>
	<style>
		.header {
  			padding: 20px;
  			text-align: center;
  			background: #2C8057;
  			color: white;
  			font-size: 20px;
		}
		.right_header {
			color: #fff;
			position: absolute; top: 40px; right: 30px;
		}
		.loginform {
			position: absolute; top: 45px; right: 30px;
			font-size: 15px;
		}
		th {
			text-align: left;
			padding: 5px;
		}
		.dropbtn {
	    background-color: #4CAF50;
	    color: white;
	    padding: 16px;
	    font-size: 16px;
	    border: none;
		}

		.dropdown {
		    position: absolute; top: 60px; right: 100px;
		    display: inline-block;
		}
		.language1 {
			position: absolute; top: 80px; right: 200px;
		}
		.language2 {
			position: absolute; top: 80px; right: 260px;
		}
		.language3 {
			position: absolute; top: 80px; right: 320px;
		}
		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f1f1f1;
		    min-width: 160px;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown-content a:hover {background-color: #ddd;}

		.dropdown:hover .dropdown-content {display: block;}

		.dropdown:hover .dropbtn {background-color: #3e8e41;}
		.allpostbutton {
		    background:none!important;
		    color:inherit;
		    border:none; 
		    padding:0!important;
		    font: inherit;
		    /*border is optional*/
		    /*border-bottom:1px solid #444; */
		    cursor: pointer;
		}
		.captcha {
			position: absolute; top: 40px; right: 400px;
		}

		/* calendar */
table.calendar		{ border-left:1px solid #999; }
tr.calendar-row	{  }
td.calendar-day	{ min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover	{ background:#eceff5; }
td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
div.day-number		{ background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
	</style>
	<link href="calendar.css" type="text/css" rel="stylesheet" />
</head>
<body style="background-color: #8BD8B1">
<header class="header">
	<h1 style="text-align: left;">Blog.com</h1>
  	<?php  
  	if (isset($user)) {
  		?>
  		<a href="?page=profilerus" style="font-size: 20px" class="language1">Рус</a>
  		<a href="?page=profilekaz" style="font-size: 20px" class="language2">Қаз</a>
  		<a href="?page=profile" style="font-size: 20px" class="language3">Eng</a>
  		<div class="dropdown">
		 	<button class="dropbtn"><?php echo $user->name; ?></button>
		 	<div class="dropdown-content">
		    	<a href="?page=profile">Profile</a>
		    	<a href="?page=bloggers">Bloggers</a>
		    	<a href="?page=calendar1">Calendar</a>
		    	<a href="exit.php">Exit</a>
		  	</div>
		</div>
  		<?php
  	}
  	else
  	{
  		$n = (rand(1,5));
  		$capt = array("1", "jnjd5", "unptd", "ndtf9", "9451b","fs9md");
  		?>
  		<img src=<?php echo "\"captchas/" . $n . ".png\"";?> class="captcha">
  		<form action="check.php" method="POST" class="loginform">
		 <div class="container">
		 	<input type="hidden" name="captcha" value=<?php echo "\"" . $capt[$n] . "\"";?>>
		 	<input type="text" placeholder="Captcha" name="captchat" required>
		    <input type="text" placeholder="Email" name="email" required>
		    <br>
		    <input type="password" placeholder="Password" name="password" required> 
		    <br><br>
		    <button type="submit">Login</button>
		    
		 </div>
		</form>
		<?php
  	}
  ?>
</header>


<?php include ''.$page.'.php'  ?>

</body>
</html>