
<!--form action="check.php" method="POST">
		 <div class="container">
		    <label><b>E-mail</b></label>
		    <input type="text" placeholder="Email" name="email" required>
		    <br><br>
		    <label><b>Password</b></label>
		    <input type="password" placeholder="Password" name="password" required> 
		    <br>
		    <button type="submit">Login</button>
		    
		 </div>
</form-->

<br>
<h2 style="text-align: center;">Register</h2>
<form action="register.php" method="post" style="text-align: center;">
		Name : <input type="text" name="name" required><br><br>
		Surname : <input type="text" name="surname" required><br><br>
		Email : <input type="text" name="email" required><br><br>
		Password : <input type="password" name="password" pattern=".{4,32}" maxlength="32" required><br><br>
		Confirm password : <input type="password" name="password2" pattern=".{4,32}" maxlength="32" required><br><br>
		
		<input type="submit" value="REGISTER">
</form>
