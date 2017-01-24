<?php

session_start();
include "../db.php";


if (isset($_SESSION["loggedIn"])) {
    include "../html/guestheader.html";
    include "../html/guestnavbar.html";

} else {
    include "../html/header.html";
    include "../html/navbar.html";
}
$current_page = "about";
echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

$location_id = $_POST["location"];

if ($location_id == 1){
	$location= "Dundee";
} else {
	$location= "Edinburgh";
}

echo "<div id='main-content'>";
echo "<div id='center-content'>";

echo "<h2> Our Policy at ".$location.": </h2>";
include "../html/policy-form.html";




// select statement
$query ="SELECT * FROM policy where policy_id='$location_id'";



$result = mysql_query($query, $db);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
// display the result


while ($row = mysql_fetch_array($result)) {
    echo "<br>";
   
    echo "<h3> Check-in time: </h3>";
	echo $row["check_in"]."</td><td><br>";
    
    echo "<h3> Check-out time: </h3>";
	echo $row["check_out"]."</td><td><br>";
	
	echo "<h3> Cancelation period: </h3>";
	echo $row["cancellation_period"]."</td><td><br>";
	
    
    // CLOSE CONNECTION
    mysql_close($db);

    //echo $row["room_number"]." </td><td>".$row["room_type"]." </td><td>".$row["price_per_night"]." </td><td>".$row["features"]." </td><td>".$row["availability"]." </td><td>";
    //echo $row["r"]." </td><td>".$row["Surname"]
}

echo "</div>";
echo "</div>";

include "../html/footer.html";

