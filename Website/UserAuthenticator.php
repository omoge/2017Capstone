<!--
	Name: Geoffrey Omo
	Date: 10/5/2017
	Course: CSC 390
	Project Description: Project 4, Database Interaction and AJAX.
-->
<?php

	class UserAuthenticator
	{
		//isLoggedIn
		public function isLoggedIn()
		{
			if(isset($_SESSION['username']))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		//authenticate
		public function authenticate($Username, $Password)
		{
			// Connect to database with database username and password
			$db_user = 'root';
			$db_pass = '';
			$connect = new PDO('mysql:host=localhost;dbname=csc320_omoge', $db_user, $db_pass);

			// Hash password when connected then search for database for username/password combo
			if ($connect)
			{
				$sql = "SELECT * FROM FSData WHERE email = :email";

				$query = $connect->prepare($sql);
				$query->bindValue(':email', $Username);
				
				$success = $query->execute();

				if(!$success)
				{
					return false;
				}

				$row = $query->fetch(PDO::FETCH_ASSOC);
					
				if ($row === false)
				{
					return false;
				}

				$db_hash_PW = $row['password_hash'];

				if (password_verify($Password, $db_hash_PW))
				{
					return true;
				}
			}
			else
			{
				return false;
			}

		}

		//logUserIn
		public function logUserIn($Username)
		{
			session_start();
			$_SESSION['username'] = $Username;
		}

		//logout
		public function logout()
		{
			session_unset();
			session_destroy();
		}

		//redirectToLogin
		public function redirectToLogin()
		{
			header("refresh:3; url=index.php");
		}
	}
?>
