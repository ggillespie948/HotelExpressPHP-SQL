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
	echo "<form action=\"../functions/change-password.php\" method=\"POST\">";
    echo "";
    
    echo "<a> Username: </a>";
	echo $row["username"] ."<input type='hidden' name='username' value='".$row["username"]."'></td><td><br>";
    
    echo "<a> Password: (change to asterisk) </a>";
	echo $row["password"] ."<input type='hidden' name='upassword' value='".$row["password"]."';'></td><td><br>";
	
	echo "<a> Old Password: </a>";
	echo "<input type='text' name='password' ></td><td><br>";
	
	echo "<a> New Password: </a>";
	echo "<input type='text' name='newpassword'></td><td><br>";

    echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Change Password </button><br><br>";

	echo "</form>";
    echo "</div>";
    
    // CLOSE CONNECTION
    mysql_close($db);

    //echo $row["room_number"]." </td><td>".$row["room_type"]." </td><td>".$row["price_per_night"]." </td><td>".$row["features"]." </td><td>".$row["availability"]." </td><td>";
    //echo $row["r"]." </td><td>".$row["Surname"]
}

