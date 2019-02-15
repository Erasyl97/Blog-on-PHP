<?php 
include 'connect_db.php';

if (isset($user)){	
?>

<div>
<h2 style="text-align: center;"> Привет, <?php echo $user->name.' '.$user->surname ?>!  </h2>
<br>
<!--pre>
	<a href="?page=newpost" style="font-size: 20px">Add new Post</a>                                     <b style="font-size: 20px">Posts</b> 
</pre-->
<table style="width: 100%">
	<tr>
		<th><a href="?page=newpost" style="font-size: 20px">Новый Пост</a></th>
		<th><b style="font-size: 20px">Посты</b></th>
		<th style="text-align: right;"><a href="?page=allposts" style="font-size: 20px">Другие Посты</a></th>
	</tr>
</table>


<hr>
<table style="width: 100%;">
	

<?php 
	$sql_text = "SELECT * FROM posts WHERE userid = " . $user->id . " ORDER BY date DESC;";
	$query = $connection->query($sql_text);
	if ($query->num_rows>0) {
		while ($row = $query->fetch_assoc()) {
			?>
			<tr>
				<td style="width: 93%; border: 1px solid black;">
					<strong>Тема:</strong> <?php echo $row['theme']; ?><br>
					<strong>Пост:</strong> <?php echo $row['post']; ?><br>
					<strong>Дата Поста:</strong> <?php echo $row['date']; ?>
				</td>
				<td style="width: 7%; border: 1px solid black; text-align: center;">
					<form action="deletepost.php" method="POST">
					<input type="hidden" name="postid" value=<?php echo "\"" . $row['id'] . "\"";?>>
					<button type="submit" class="allpostbutton"><strong style="border-bottom: 1px solid #444;">Удалить</strong></button>
					</form>
				</td>
			</tr>
			
			<?php
		}
	}
?>
</table>

</div>

<?php		
}else{
	header("Location: index.php");
}
?>