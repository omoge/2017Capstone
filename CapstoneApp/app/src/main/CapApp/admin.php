<?php
	session_start();
	require 'UserAuthenticator.php';
	$UserAuthenticator = new UserAuthenticator;
	if($UserAuthenticator->isLoggedIn() == false)
	{
		header("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Franciscan Scholars Database</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="img/SanDamianoCross.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<div class="header">
			<h2>Franciscan Scholars Database - Menu</h2>
		</div>
		<img src="tower.png" alt="tower">
		<form action="admin.php" method="post">
			<input type="submit" name="add" value="Add"/>
			<br />
			<input type="submit" name="remove" value="Remove"/>
			<br />
			<input type="submit" name="update" value="Update"/>
			<br />
			<input type="submit" name="add_event" value="Add Event"/>
			<br />
			<input type="submit" name="logout" value="Log Out"/>
			<br />
		</form>

		<?php
			if(isset($_POST["add"]))
			{
				header("Location: add.php");
			}

			if(isset($_POST["remove"]))
			{	
				header("Location: remove.php");
			}

			if(isset($_POST["update"]))
			{
				header("Location: update.php");
			}

			if(isset($_POST["add_event"]))
			{	
				header("Location: event.php");
			}

			if(isset($_POST["logout"]))
			{	
				header("Location: logout.php");
			}
		?>
	</body>
</html>