<h3>Add Post:</h3>
<form action="addpost.php" method="POST">
	<label><b>Posts theme:</b></label>
	<input type="text" name="theme" required><br><br>

	<label><b>Write Post:</b></label>
	<textarea name="post" required></textarea><br>
	<input type="hidden" name="userid" value= <?php echo "\"" . $user->id . "\"";?>>
	<input type="submit">
</form>
