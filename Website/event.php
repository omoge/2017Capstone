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
        <title>Franciscan Scholars - Events</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/SanDamianoCross.ico" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div class="header">
            <h2>Franciscan Scholars - Events</h2>
        </div>

        <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=quincy.edu_0m1mlk311ifo1k2l5tsatjibpg%40group.calendar.google.com&amp;color=%235B123B&amp;ctz=America%2FChicago" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

        <a href = "admin.php">Return to home</a>
    </body>
</html>
