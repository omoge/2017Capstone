<!DOCTYPE html>
<html>
<head> <title>User Login page</title></head>

	<body>
	<h1>User Login</h1>
		<form action="user_login.php" method="post">

			Username: <input type = "text" name="username" />
			Password: <input type = "text" name="password" />

<input type= "submit" name="SubmitButton" value="Login" />
<br>

</form>
<p>Username=qustudent
	Password=gohawks123 </p>
	<p>This is just for now... </p>

<?php
	if(isset($_POST["SubmitButton"]))
		{
			$username=$_POST["username"];
			$password=$_POST["password"];
			
			$u="qustudent";
			$p="gohawks123";
			
			if($username==$u && $password==$p){
				
				header("Location: hours.php");
			
			
			}
			
		}





?>

</body>
</html>