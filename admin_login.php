<!DOCTYPE html>
<html>
<head> <title>Admin Login page</title></head>

	<body>
	<h1>Admin Login</h1>
		<form action="admin_login.php" method="post">

			Username: <input type = "text" name="username" />
			Password: <input type = "text" name="password" />

<input type= "submit" name="SubmitButton" value="Login" />
<br>
</form>

<?php
	if(isset($_POST["SubmitButton"]))
		{
			$username=$_POST["username"];
			$password=$_POST["password"];
			
			$u="quadmin";
			$p="gohawks123";
			
			if($username==$u && $password==$p){
				
				header("Location: database_menu.php");
			
			
			}
			
		}





?>

</body>
</html>