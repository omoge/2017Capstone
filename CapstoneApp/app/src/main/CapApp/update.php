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

		<form action="update.php" method="post">
			Student ID number to update:<input type="text" name="student_id"/>
			<br>
			<input type="submit" name="submit" value= "Retrieve Student"/>
			<br>
			<input type="submit" name="return" value= "Return to main menu"/>
		</form> 

		<?php
			if(isset($_POST["submit"]))
			{
				$id = $_POST["student_id"];

				if(empty($id))
				{
					die("<p>Please enter all the fields.</p>");
				}

				$db_user = 'csc320_gruenre';
				$db_pass = 'starwars';
				$connect = new PDO('mysql:host=thor.quincy.edu;dbname=csc320_gruenre', $db_user, $db_pass);
				
				if(!$connect)
				{
					die("<p>Unable to connect to the database!</p>");
				}

				// Define the query with placeholders
				$sql = "SELECT * FROM FSData WHERE id = :id";
				
				// Prepare the statement, giving us a PDO statement object
				$query = $connect->prepare($sql);

				// Bind values to the placeholders in the query
				$query->bindValue(':id', $id);

				// Execute the query				
				$success = $query->execute();
	
				if(!$success)
				{
					echo "<p>Unable to find user.</p>";
					exit;
				}
	
				$row = $query->fetch(PDO::FETCH_ASSOC);

				if($row == 0)
				{
					echo "<p>Unable to find user.</p>";
					exit;
				}
	
				$id = $row['id'];
				$firstName = $row['firstName'];
				$lastName = $row['lastName'];
				$email = $row['email'];
				$year = $row['year'];
				$hours = $row['hours'];
				$completion = $row['completion'];
				$reflection = $row['reflection'];
				$renewal = $row['renewal'];
				$notes = $row['notes'];

				echo
					"<form action='update.php' method='post'> 
						<input type='hidden' name='id' value='" . $id . "'/>
						First Name:<input type='text' name='fname' pattern='[A-Za-z].{0,}' value='" . $firstName . "'/>
						<br> 
						Last Name:<input type='text' name='lname' pattern='[A-Za-z].{0,}' value='" . $lastName . "'/>
						<br>
						E-mail Address:<input type='email' name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' value='" . $email . "'/>
						<br>
						Year (FR, SH, JR or SR): <input type='text' name='year' value='" . $year . "'/>
						<br>
						Hours:<input type='number' name='hours' value='" . $hours . "'/>
						<br>
						Hours completed?
						<label><input type='radio' name='completion' value='true' />Yes</label>
						<label><input type='radio' name='completion' value='false' />No</label>
						<br>
						Reflection paper completed?
						<label><input type='radio' name='reflection' value='true' />Yes</label>
						<label><input type='radio' name='reflection' value='false' />No</label>
						<br>
						Renewal?
						<label><input type='radio' name='renewal' value='true' />Yes</label>
						<label><input type='radio' name='renewal' value='false' />No</label>
						<br>
						Notes: <br><textarea name='notes' rows='10' cols='26'>". $notes ."</textarea>
						<br>
						Password:<input type='text' name='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' />
						<br>			
						<input type='submit' name='update' value='Update Student'/>
					</form>";
			}

			if(isset($_POST["update"]))
			{
				$id = $_POST['id'];
				$firstname = $_POST["fname"];
				$lastname = $_POST["lname"];
				$email = $_POST["email"];
				$year = $_POST["year"];
				$hours = $_POST["hours"];
				$notes = $_POST["notes"];
				$password = $_POST["password"];

				if(empty($firstname) || empty($lastname) || empty($year) || empty($email) || empty($hours) || empty($password))
				{
					die("<p>Please enter all the fields.</p>");
				}

				if(empty($notes))
				{
					$notes = "";
				}
				
				$_POST['completion'] = $_POST['completion'] == 'true' ? 1 : 0;
				$_POST['reflection'] = $_POST['reflection'] == 'true' ? 1 : 0;
				$_POST['renewal'] = $_POST['renewal'] == 'true' ? 1 : 0;
				$completion = $_POST["completion"];
				$reflection = $_POST["reflection"];
				$renewal = $_POST["renewal"];

				$db_user = 'root';
				$db_pass = '';
				$connect = new PDO('mysql:host=localhost;dbname=csc320_omoge', $db_user, $db_pass);
				
				if(!$connect)
				{
					die("<p>Unable to connect to the database!</p>");
				}

				// Define the query with placeholders
				$sql = "UPDATE FSData SET firstName = :firstName, lastName = :lastName, email = :email, year = :year, hours = :hours, completion = :completion, reflection = :reflection, renewal = :renewal, notes = :notes WHERE id = :id;";

				// Prepare the statement, giving us a PDO statement object
				$query = $connect->prepare($sql);

				// Bind values to the placeholders in the query
				$query->bindValue(':firstName', $firstname);
				$query->bindValue(':lastName', $lastname);
				$query->bindValue(':email', $email);
				$query->bindValue(':year', $year);
				$query->bindValue(':hours', $hours);
				$query->bindValue(':completion', $completion);
				$query->bindValue(':reflection', $reflection);
				$query->bindValue(':renewal', $renewal);
				$query->bindValue(':notes', $notes);
				$query->bindValue(':id', $id);

				// Execute the query
				$success = $query->execute();
						
				if (!$success)
				{
					echo "<p>Update failed. Could not update fields into the database.</p>";
					exit;
				}

				echo "<p>Update complete.</p>";
			}

			if(isset($_POST["return"]))
			{
				header("Location: admin.php"); 
			}
		?>
	</body>
</html>