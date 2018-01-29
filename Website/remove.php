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
		<title>Franciscan Scholars Database - Remove</title>
		<link rel="shortcut icon" href="img/SanDamianoCross.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<h1>Remove from Database</h1>

		<form action="remove.php" method="post">
			Student ID number to delete:<input type="text" name="student_id"/>
			<br>
			<input type="submit" name="SubmitB" Value= "Delete Student"/>
			<br>
			<input type="submit" name="goBack" Value= "Go back to main menu"/>
		</form> 

		<?php
			if(isset($_POST["SubmitB"]))
			{
				$id = $_POST["student_id"];

				if(empty($id))
				{
					die("<p>Please enter all the fields.</p>");
				}

				$db_user = 'root';
				$db_pass = '';
				$connect = new PDO('mysql:host=localhost;dbname=csc320_omoge', $db_user, $db_pass);

				if(!$connect)
				{
					die("<p>Unable to connect to the database!</p>");
				}

				// Define the query with placeholders
				$sql = "DELETE FROM FSData WHERE id = :id";
				
				// Prepare the statement, giving us a PDO statement object
				$query = $connect->prepare($sql);

				// Bind values to the placeholders in the query
				$query->bindValue(':id', $id);

				// Execute the query
				$success = $query->execute();
							
				if ($success)
				{
					echo "<p>Record deleted.</p>";
				}
				else
				{
					echo "<p>Deletion failed.</p>";
					exit;
				}
			}

			if(isset($_POST["goBack"]))
			{
				header("Location: admin.php"); 
			}
		?>
	</body>
</html>
