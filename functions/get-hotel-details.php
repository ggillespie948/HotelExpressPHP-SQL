<?php

include "../db.php";

/* Hotel ID $hotelid = $_SESSION["hotelid"]; */

// select statement
$query = "SELECT * FROM hotel WHERE hotel_id='$hotelid'";


$result = mysql_query($query, $db);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}

//Get infromation from search


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

    echo "<div id='result-entry'>";
	echo "<form action=\"reserve-room.php\" method=\"POST\">";
    echo "";
    echo "<img src=\"http://www.whitehartboston.com/wp-content/uploads/2015/11/White-Hart-Hotel-Boston-evening-2-150x150.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";
    echo "<a> Address: </a>";
	echo $row["address"] ."<input type='hidden' name='address' value='".$row["address"]."'></td><td><br>";
    
    echo "<a> Postcode:  </a>";
	echo $row["postcode"] ."<input type='hidden' name='postcode' value='".$row["postcode"]."';'></td><td><br>";
        
    echo "<a> City:  </a>";
	echo $row["city"] ."<input type='hidden' name='city' value='".$row["city"]."';'></td><td><br>";
        
    echo "<a> Telephone number:  </a>";
	echo $row["telephone_no"] ."<input type='hidden' name='telephone_no' value='".$row["telephone_no"]."';'></td><td><br>";
        
    echo "<a> Email:  </a>";
	echo $row["email_address"] ."<input type='hidden' name='email_address' value='".$row["email_address"]."';'></td><td><br>";
        
    echo "<a> Website:  </a>";
	echo $row["website"] ."<input type='hidden' name='website' value='".$row["website"]."';'></td><td><br>";
        
    echo "<a> Rating: </a>";
	echo $row["rating"] ."<input type='hidden' name='rating' value='".$row["rating"]."';'></td><td><br>";


	echo "</form>";
    echo "</div>";
    
    // CLOSE CONNECTION
    mysql_close($db);

    //echo $row["room_number"]." </td><td>".$row["room_type"]." </td><td>".$row["price_per_night"]." </td><td>".$row["features"]." </td><td>".$row["availability"]." </td><td>";
    //echo $row["r"]." </td><td>".$row["Surname"]
}

