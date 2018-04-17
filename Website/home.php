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
		<title>Franciscan Scholars - Student</title>
        <link rel="shortcut icon" href="img/SanDamianoCross.ico" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
		<h2>Franciscan Scholars</h2>

        <?php
            $email = $_SESSION["username"];

			// Connect to database with database username and password
            $db_user = 'root';
            $db_pass = '';
            $connect = new PDO('mysql:host=localhost;dbname=csc320_omoge', $db_user, $db_pass);
            
			// Hash password when connected then search for database for username/password combo
			if (!$connect)
			{
                echo "<p>Unable to establish connection.</p>";
                exit;
            }

            $sql = "SELECT * FROM FSData WHERE email = :email";

            $query = $connect->prepare($sql);
            $query->bindValue(':email', $email);
				
            $success = $query->execute();

            if(!$success)
            {
                echo "<p>Unable to find user.</p>";
                exit;
            }

            $row = $query->fetch(PDO::FETCH_ASSOC);

            $id = $row['id'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $year = $row['year'];
            $reflection = $row['reflection'];
            $hours = $row['hours'];

            if($year == "FR")
            {
                $hoursLeft = 20 - $hours;
            }
            else if($year == 'SH')
            {
                $hoursLeft = 25 - $hours;
            }
            else if($year == "JR" || $year == "SR")
            {
                $hoursLeft = 30 - $hours;
            }

            if($hoursLeft > 0)
            {
                $message = "<p>Remaining hours: $hoursLeft.</p>";
            }
            else
            {
                $message = "<p>Hours achieved.</p>";
            }

            if($reflection == 1)
            {
                $rmessage = "<p>Reflection paper completed.</p>";
            }
            else
            {
                $rmessage = "<p>Reflection paper not completed.</p>";
            }
        ?>

        <p>Welcome, <?php echo "$firstName, $lastName";?>. <?php echo "$message $rmessage" ?></p>
        
        <form action="home.php" method="post">
            Enter Hours: <input type="number" name="hours" min="0"><br />
            <!--
                <p>Upcoming events: </br>
                </p>
            -->
			<input type="submit" name="submit" Value="Add Hours" />
			<input type="submit" name="calendar" value="Calendar"/>
			<input type="submit" name="logout" value="Log Out"/>
			<br />
        </form>

        <?php
			if(isset($_POST["submit"]))
			{
                $newhours = $_POST["hours"] + $hours;
                $sql = "UPDATE FSData SET hours = :hours WHERE id = :id";

                $query = $connect->prepare($sql);
                $query->bindValue(':hours', $newhours);
                $query->bindValue(':id', $id);
                    
                $success = $query->execute();

                if(!$success)
                {
                    echo "<p>Update failed. Unable to connect to database.</p>";
                    exit;
                }

                if($year == "FR")
                {
                    $hoursLeft = 20 - $newhours;
                }
                else if($year == "SH")
                {
                    $hoursLeft == 25 - $newhours;
                }
                else if($year == "JR" || $year == "SR")
                {
                    $hoursLeft = 30 - $newhours;
                }

                if($hoursLeft > 0)
                {
                    $message = "<p>Remaining hours: $hoursLeft.</p>";
                }
                else
                {
                    $message = "<p>Hours achieved.</p>";
                }

                echo "<p>Hours updated.</p>";

            }

			if(isset($_POST["calendar"]))
			{	
				header("Location: calendar.php");
			}
            
            if(isset($_POST["logout"]))
            {	
                header("Location: logout.php");
            }
        ?>
    </body>
</html>
