<?php
	session_start();
	require 'UserAuthenticator.php';
	$UserAuthenticator = new UserAuthenticator;
    if($UserAuthenticator->isLoggedIn() == true)
	{
		if($_SESSION["username"] == "admin")
		{
			header("location: admin.php");
		}
		else
		{
			header("location: home.php");
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Franciscan Scholars</title>
		<link rel="shortcut icon" href="img/SanDamianoCross.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
		<h2>Franciscan Scholars</h2>

		<form action="index.php" method="post">
			<label>Username</label>
			<br />
			<input type="text" 	name="username" />
			<br />
			<label>Password</label>
			<br />
			<input type="password" name="password" />
			<br />
			<br />
			<input type="submit" name="submit" value="Sign in" />
		</form>
		
		<?php
			if(isset($_POST["submit"]))
			{
				$Username = $_POST["username"];
				$Username = htmlspecialchars($Username);
				$Password = $_POST["password"];
				$password = htmlspecialchars($password);
				
				if(empty($Username) || empty($Password))
				{
					echo "<p>Please enter all the fields.</p>";
				}
				else
				{   
					if( $UserAuthenticator->authenticate($Username, $Password) === true )
					{
						$UserAuthenticator->logUserIn($Username);
						$_SESSION["username"] = $Username;
						if($Username == "admin")
						{
							header("location: admin.php");
						}
						else
						{
							header("location: home.php");
						}
					}
					else
					{
						echo "<p>Invalid log in.</p>";
					}
				}
			}
		?>
	</body>

</html>
