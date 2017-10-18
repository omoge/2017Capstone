<!DOCTYPE html>
<html>
<head> <title>Menu page</title></head>

	<body>
	<h1>User or Admin?</h1>
		<form action="user_or_admin.php" method="post">

			If you are a student, log in here: <input type="submit" name="student" Value="Student"/>
				<br>

			If you are an administrator, log in here:<input type="submit" name="admin" Value="Administrator"/>
					<br>
</form>

<?php
	if(isset($_POST["sutdent"]))
		{
			header("Location: user_login.php");
		}
		if(isset($_POST["admin"]))
		{	
			header("Location: admin_login.php");
		}

?>

</body>
</html>