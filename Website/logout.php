<?php
	session_start();
    require 'UserAuthenticator.php';
    $UserAuthenticator->logout();
    $UserAuthenticator->redirectToLogin();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Franciscan Scholars Database</title>
		<link rel="shortcut icon" href="img/SanDamianoCross.ico" />
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <p>You have successfully logged out.</p>
        <p>Returning to the main menu.</p>
        <p>Click <a href = "login.php">here</a> if page has not redirected after 3 seconds.</p>
    </body>
</html>
