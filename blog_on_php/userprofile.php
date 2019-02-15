<?php  
	include 'connect_db.php';

	if (isset($user)) {
		if (isset($_POST['userid'])) {
		$sql_text = "SELECT * FROM users WHERE id= " . $_POST['userid'] . ";";
		$sql_text2 = "SELECT * FROM posts WHERE userid=" . $_POST['userid'] . " ORDER BY date DESC;";
		$query = $connection->query($sql_text);
		$query2 = $connection->query($sql_text2);
		$profile_user = $query->fetch_assoc(); ?>
		<h2 style="text-align: center;"> Hello, I am <?php echo $profile_user['name'] .' '.$profile_user['surname'] ?>! And welcome to my Blog!!!</h2>
		<h2 style="text-align: center;">My Posts</h2>
		<table style="width: 100%">
		  <tr>
		    <td>
		      	<?php
				if ($query2->num_rows>0) {
					while ($row = $query2->fetch_assoc()) {
						?>
						
						<strong>Theme:</strong> <?php echo $row['theme']; ?><br>
						<strong>Post:</strong> <?php echo $row['post']; ?><br>
						<strong>Posted date:</strong> <?php echo $row['date']; ?>
						<hr>
						<?php
					}
				} ?>
		    </td>
		  </tr>
		</table>
		<?php
	}
	}else{
		header("Location: index.php");
	}

?>