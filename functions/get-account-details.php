<?php


include "../db.php";

$username = $_SESSION["username"];

// select statement
$query ="SELECT * FROM guest_view where username='$username'";


$result = mysql_query($query, $db);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
// display the result

//Get infromation from search


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

    echo "<div id='result-entry'>";
	echo "<form action=\"reserve-room.php\" method=\"POST\">";
    echo "";
	
    
    echo "<a> Email: </a>";
	echo $row["email_address"] ."<input type='hidden' name='email_address' value='".$row["email_address"]."'></td><td><br>";
    
    echo "<a> First name: </a>";
	echo $row["first_name"] ."<input type='hidden' name='first_name' value='".$row["first_name"]."'></td><td><br>";

    echo "<a> Surname: </a>";
    echo $row["surname"] ."<input type='hidden' name='surname' value='".$row["surname"]."'></td><td><br>";

    echo "<a> DOB: </a>";
	echo $row["dob"] ."<input type='hidden' name='dob' value='".$row["dob"]."'></td><td><br>";

    echo "<a> Address: </a>";
	echo $row["address"] ."<input type='hidden' name='address' value='".$row["address"]."'></td><td><br>";
        
    echo "<a> City: </a>";
	echo $row["city"] ."<input type='hidden' name='address' value='".$row["city"]."'></td><td><br>";
        
    echo "<a> Postcode: </a>";
	echo $row["postcode"] ."<input type='hidden' name='postcode' value='".$row["postcode"]."'></td><td><br>";

    echo "<a> Telephone number: </a>";
	echo $row["telephone_no"] ."<input type='hidden' name='telephone_no' value='".$row["telephone_no"]."'></td><td><br>";

    //echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Update contact details </button><br><br>";

	echo "</form>";
    echo "</div>";
    
    // CLOSE CONNECTION
    mysql_close($db);

    //echo $row["room_number"]." </td><td>".$row["room_type"]." </td><td>".$row["price_per_night"]." </td><td>".$row["features"]." </td><td>".$row["availability"]." </td><td>";
    //echo $row["r"]." </td><td>".$row["Surname"]
}

