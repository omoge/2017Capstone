<!DOCTYPE html>
<html>
<head> <title>Database Menu page</title></head>

	<body>
	<h1>Database Menu: Add, Remove, Update, Events</h1>
		<form action="database_menu.php" method="post">

			 <input type="submit" name="add" Value="Add"/>
				<br>

			<input type="submit" name="remove" Value="Remove"/>
					<br>
					
					<input type="submit" name="update" Value="Update"/>
					<br>
					
					<input type="submit" name="add_event" Value="Add Event"/>
					<br>
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

?>

</body>
</html>