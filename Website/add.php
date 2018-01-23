<!DOCTYPE html>
<?php
	session_start();
	require 'UserAuthenticator.php';
	$UserAuthenticator = new UserAuthenticator;
	if($UserAuthenticator->isLoggedIn() == false)
    {
		header("location: index.php");
    }
?>
<html>
	<head>
		<title>Franciscan Scholars Database</title>
		<link rel="shortcut icon" href="img/SanDamianoCross.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<h1>Add to Database</h1>

		<form action="add.php" method="post">
			ID:<input type="text" name="id"/>
			<br> 
			First Name:<input type="text" name="fname" />
			<br> 
			Last Name:<input type="text" name="lname" />
			<br>
			E-mail Address:<input type="text" name="email" />
			<br>
			Year(Please put FR, SH, JR or SR): <input type="text" name="year" />
			<br>
			Hours:<input type="number" name="hours" />
			<br>
			Compeltion of Reflection paper?
			<label><input type="radio" name="reflection" value="true" />Yes</label>
			<label><input type="radio" name="reflection" value="false" />No</label>
			<br>
			Renewal?
			<label><input type="radio" name="renewal" value="true" />Yes</label>
			<label><input type="radio" name="renewal" value="false" />No</label>
			<br>
			Notes: <br><textarea name="notes" rows="10" cols="26"></textarea>
			<br>
			Password:<input type="text" name="password" />
			<br>
			<input type="submit" name="submit" Value="Add to Database"/>
		</form> 


		<?php

			if(isset($_POST["submit"]))
			{
				$id = $_POST["id"];
				$firstname = $_POST["fname"];
				$lastname = $_POST["lname"];
				$email = $_POST["email"];
				$year = $_POST["year"];
				$hours = $_POST["hours"];
				$notes = $_POST["notes"];
				$password = $_POST["password"];

				if(empty($id) || empty($firstname) || empty($lastname) || empty($year) || empty($email) || empty($hours) || empty($password))
				{
					die("<p>Please enter all the fields.</p>");
				}

				if(empty($notes))
				{
					$notes = "";
				}
				
				$_POST['reflection'] = $_POST['reflection'] == 'true' ? 1 : 0;
				$_POST['renewal'] = $_POST['renewal'] == 'true' ? 1 : 0;
				$reflection = $_POST["reflection"];
				$renewal = $_POST["renewal"];

				$HashPW = password_hash($password, PASSWORD_DEFAULT);

				$db_user = 'root';
				$db_pass = '';
				$connect = new PDO('mysql:host=localhost;dbname=csc320_omoge', $db_user, $db_pass);

				if(!$connect)
				{
					die("<p>Unable to connect to the database!</p>");
				}

				// Define the query with placeholders
				$sql = "INSERT INTO FSData (id, firstName, lastName, email, year, hours, reflection, renewal, notes, password_hash) VALUES (:id, :firstName, :lastName, :email, :year, :hours, :reflection, :renewal, :notes, :password);";

				// Prepare the statement, giving us a PDO statement object
				$query = $connect->prepare($sql);

				// Bind values to the placeholders in the query
				$query->bindValue(':id', $id);
				$query->bindValue(':firstName', $firstname);
				$query->bindValue(':lastName', $lastname);
				$query->bindValue(':email', $email);
				$query->bindValue(':year', $year);
				$query->bindValue(':hours', $hours);
				$query->bindValue(':reflection', $reflection);
				$query->bindValue(':renewal', $renewal);
				$query->bindValue(':notes', $notes);
				$query->bindValue(':password', $HashPW);

				// Execute the query
				$success = $query->execute();
						
				if ($success)
				{
					echo "<p>Registration complete. Return to the login page.</p>";
				}
				else
				{
					echo "<p>Registration failed. Could not register fields into the database.</p>";
					exit;
				}
			}  
		?>

	</body>
</html>
