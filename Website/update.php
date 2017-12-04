
<!DOCTYPE html>
 <html>
 <head>
<title>Update page</title>
</head>

<body>

<h1>Update Database</h1>




<form action="update.php" method="post">
ID:<input type="text" name="id"/>
<br>
<br>
Last Name:<input type="text" name="lname"/>
<br>
First Name:<input type="text" name="fname"/>
<br>  
Year:(Please put FR,SH,JR,or SR)<input type="text" name="year"/>
<br>
E-mail Address:<input type="text" name="email"/>
<br>
Hours:<input type="text" name="hours"/>
<br>
<!--
Compeltion of Reflection paper?
<label><input type="radio" name="reflection" value="TRUE"/>Yes</label>
<label><input type="radio" name="reflection" value="FALSE"/>No</label>
<br>
Renewal?
<label><input type="radio" name="renewal" value="TRUE"/>Yes</label>
<label><input type="radio" name="renewal" value="FALSE"/>No</label>
<br>
 Notes: <br><textarea name="notes" rows="10" cols="26"></textarea> 
 
 <br> -->
<input type="submit" name="SubmitB" Value= "Update Student"/>
<br>
<input type="submit" name="goBack" Value= "Go back to main menu"/>
 
 </form>

 
 <?php
	if(isset($_POST["SubmitB"]))
		{ $lastname=$_POST["lname"];
			$id=$_POST["id"];

			$firstname=$_POST["fname"];
			
			
			$year=$_POST["year"];
			$email=$_POST["email"];
			$hours=$_POST["hours"];/*
			$reflection=$_POST["reflection"];
			$renewal=$_POST["renewal"];
			$notes=$_POST["notes"]; */
			
			$conn=mysqli_connect("thor.quincy.edu", "csc320_gruenre", "starwars");
                        if(!$conn)
                        {
                                die("Unable to connect to the database!");
                        }

                mysqli_select_db($conn, "csc320_gruenre");
				
$updateQuery="UPDATE FSData SET LastName='$lastname',FirstName='$firstname',Year='$year',Email='$email',Hours='$hours' WHERE ID=$id;";
//echo $updateQuery;
				
				$result= mysqli_query($conn, $updateQuery);
//echo $result;

	
if ($conn->query($updateQuery) === TRUE) {
    echo "Record updated successfully";
}
		
				
				
		}

		if(isset($_POST["goBack"]))
		{
			header("Location: database.php");
			
			
		}
		?>
 

</body>
</html>
