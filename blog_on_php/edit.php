<?php 
if (isset($user)){	
?>

<div>
<h2> Hello, <?php echo $user->name.' '.$user->surname ?>!  </h2>
<br>
<h4>Your email:  <?php echo $user->email; ?></h4>
<br>

<a href="exit.php"><h3>exit</h3></a>
</div>

<?php		
}else{
	header("Location: index.php");
}
?>