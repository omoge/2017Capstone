<?php
	session_start();
    require 'UserAuthenticator.php';
	$UserAuthenticator = new UserAuthenticator;
    $UserAuthenticator->logout();
    $UserAuthenticator->redirectToLogin();
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>Franciscan Scholars - Logging Out</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="img/SanDamianoCross.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
		<div class="header">
			<h2>Franciscan Scholars - Logging Out</h2>
		</div>
        
        <div class="col-6 col-m-9">
            <p>You have successfully logged out.</p>
            <p>Returning to the main menu.</p>
           <!-- <p>Click <a href="index.php">here</a> if page has not redirected after 3 seconds.</p>-->
        </div>
    </body>
</html>