<!DOCTYPE html>
 <html>
 <head>
<title>Add page</title>
</head>

<body>

<h1>Add to Database</h1>

</body>
</html>

<form action="add.php" method="post">


Last Name:<input type="text" name="lname"/>
<br>
First Name:<input type="text" name="fname"/>
<br> 
ID:<input type="text" name="id"/>
<br> 
Year:(Please put FR,SH,JR,or SR)<input type="text" name="year"/>
<br>
E-mail Address:<input type="text" name="email"/>
<br>
Hours:<input type="text" name="hours"/>
<br>
Compeltion of Reflection paper?
<label><input type="radio" name="reflection" value="TRUE"/>Yes</label>
<label><input type="radio" name="reflection" value="FALSE"/>No</label>
<br>
Renewal?
<label><input type="radio" name="renewal" value="TRUE"/>Yes</label>
<label><input type="radio" name="renewal" value="FALSE"/>No</label>
<br>
 Notes: <br><textarea name="notes" rows="10" cols="26"></textarea>
 <br>
 <input type="submit" name="SubmitButton" Value= "Add to Database"/>
 
 </form> 
 

<?php
	if(isset($_POST["SubmitButton"]))
		{
			$firstname=$_POST["fname"];
			$lastname=$_POST["lname"];
			$id=$_POST["id"];
			$year=$_POST["year"];
			$email=$_POST["email"];
			$hours=$_POST["hours"];
			$reflection=$_POST["reflection"];
			$renewal=$_POST["renewal"];
			$notes=$_POST["notes"];
			
		
		echo $notes;
			
		  $conn=mysqli_connect("thor.quincy.edu", "csc320_gruenre", "starwars");
                        if(!$conn)
                        {
                                die("Unable to connect to the database!");
                        }

                mysqli_select_db($conn, "csc320_gruenre");
		

$insertQuery="INSERT INTO FSData VALUES ('$lastname','$firstname','$id','$year','$email','$hours','$reflection','$renewal','NULL','$notes');";
		
//$insertQuery="INSERT INTO FSData VALUES ('$lastname','$firstname','$id','$year','$email','$hours','$reflection');";

//echo $insertQuery;

	
$result= mysqli_query($conn, $insertQuery);
//echo $result;

	if(mysqli_affected_rows($conn)==-1)
		{
			echo "Failed to insert new user";
		}
	else
	{	
		echo "Information successfully added!";
	}
		
	}  

?>
</body>
</html>
