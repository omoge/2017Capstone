
<!DOCTYPE html>
 <html>
 <head>
<title>Remove page</title>
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
			$id_number=$_POST["student_id"];
			
			$conn=mysqli_connect("thor.quincy.edu", "csc320_gruenre", "starwars");
                        if(!$conn)
                        {
                                die("Unable to connect to the database!");
                        }

                mysqli_select_db($conn, "csc320_gruenre");
				
				$deleteQuery="DELETE FROM FSData WHERE ID=$id_number;";
				
				$result= mysqli_query($conn, $deleteQuery);
//echo $result;

	
if ($conn->query($deleteQuery) === TRUE) {
    echo "Record deleted successfully";
}
		
				
				
		}
		if(isset($_POST["goBack"]))
		{
			header("Location: database.php");
			
			
		}
		?>
 

</body>
</html>