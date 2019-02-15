<?php 
include 'connect_db.php';

if (isset($user)){	
?>

<div>
<h2 style="text-align: center;"> All Posts on Blog.com!  </h2>
<br>



<hr>
<?php 
	$sql_text = "SELECT * FROM posts ORDER BY date DESC;";
	
	$query = $connection->query($sql_text);
	if ($query->num_rows>0) {
		while ($row = $query->fetch_assoc()) {
			?>
			<?php 
				$sql_text2 = "SELECT * FROM users WHERE id =" . $row['userid'] . ";";
				$query2result = $connection->query($sql_text2);
				$row2 = $query2result->fetch_assoc();
			 ?>
			<strong>Theme:</strong> <?php echo $row['theme']; ?><br>
			<strong>Post:</strong> <?php echo $row['post']; ?><br>
			<strong>Posted date:</strong> <?php echo $row['date']; ?><br>
			<?php
			if ($row['userid'] != $user->id) {
			 	?>
			 	<form action="?page=userprofile" method="POST">
				<input type="hidden" name="userid" value=<?php echo "\"" . $row['userid'] . "\"";?>>
				<strong>Postted By: </strong><button type="submit" class="allpostbutton"><strong style="border-bottom: 1px solid #444;"><?php echo $row2['name'] ?></strong></button>	
				</form>
				<?php  
			} 
			?>
			<hr>
			<?php
		}
	}
?>


</div>

<?php		
}else{
	header("Location: index.php");
}
?>