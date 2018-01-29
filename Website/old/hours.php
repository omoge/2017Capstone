<!-- Gina's code -->
<?php
        session_start();
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<form action="hours.php" method="post">

        Enter Student ID:<input type="text" name="stu_id">
        <input type="submit" name="getHours" value="Submit to see hours"></br>
        <!-- Hours: <input type="text" name="uhours"> </br>
        Hours Left: <input type="text" name="levhours"></br> -->
	Upcoming events: </br>
        <p> we can put here if we want to get fancy</p>
        </form>
         <?php
                if(isset($_POST["getHours"]))
                {
                        $id_number=$_POST["stu_id"];


                        $conn=mysqli_connect("thor.quincy.edu", "csc320_gruenre", "starwars");

                        if(!$conn)
                        {
                                die("Unable to connect to the database!");
                        }

                mysqli_select_db($conn, "csc320_gruenre");

                $hoursQuery= "SELECT Hours, Year FROM FSData WHERE ID='".$id_number."';";
		//echo $hoursQuery;
                        $results= mysqli_query($conn, $hoursQuery);


                                while($row=mysqli_fetch_array($results))
                                {
                                        $CurrentHours= $row["Hours"];
                                        $CurrentYear= $row["Year"];

                                        echo "You have  ". $CurrentHours ." hours" ."<br>";
                                        echo "You are a ". $CurrentYear. " with ";


                                        if($CurrentYear=="FR" || $CurrentYear=="fr"){
                                                $HoursLeft= 20-$CurrentHours;
                                        echo $HoursLeft. " hours left";

                                                }
 while($row=mysqli_fetch_array($results))
                                {
                                        $CurrentHours= $row["Hours"];
                                        $CurrentYear= $row["Year"];

                                        echo "You have  ". $CurrentHours ." hours" ."<br>";
                                        echo "You are a ". $CurrentYear. " with ";


                                        if($CurrentYear=="FR" || $CurrentYear=="fr"){
                                                $HoursLeft= 20-$CurrentHours;
                                        echo $HoursLeft. " hours left";

                                                }
                                        else if($CurrentYear=="SH" || $CurrentYear=="sh"){
                                                $HoursLeft= 25-$CurrentHours;
                                        echo $HoursLeft. " hours left";

                                                }
                                         else if($CurrentYear=="JR" || $CurrentYear=="jr"){
                                                $HoursLeft= 30-$CurrentHours;
                                        echo $HoursLeft. " hours left";

                                                }
                                        else if($CurrentYear=="SR" || $CurrentYear=="sr"){
                                                $HoursLeft= 30-$CurrentHours;
                                        echo $HoursLeft. " hours left";

                                                }
                                        else{echo "Wrong data...";}
        }

                        }

         ?>





</body>
</html>
<!-- Gina's code -->


