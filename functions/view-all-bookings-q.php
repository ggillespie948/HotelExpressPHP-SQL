<?php

$query = "SELECT * from guest_booking_view";

$result = mysql_query($query, $db);
// display the result


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

    echo "<div id='result-entry'>";
	echo "<form action=\"manage-booking.php\" method=\"POST\">";
    echo "<br><br>";
    echo "<img src=\"http://www.michigantechpreschool.org/images/Apps-Calendar-Metro-icon.png\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";
    
    echo "<a> Booking ID: </a>";
	echo $row["booking_id"]."<input type='hidden' name='booking_id' value='".$row["booking_id"]."'></td><td><br>";

    echo "<a> Guest Booking Email: </a>";
    echo $row["email_address"]."<input type='hidden' name='email_address' value='".$row["email_address"]."'></td><td><br>";

    echo "<a> Number of guests: </a>";
	echo $row["no_of_guests"]."<input type='hidden' name='no_of_guests' value='".$row["no_of_guests"]."'></td><td><br>";
        
    echo "<a> Employee ID (if any): </a>";
	echo $row["employee_id"]."<input type='hidden' name='employee_id' value='".$row["employee_id"]."'></td><td><br>";

    echo "<a> Room No: </a>";
	echo $row["room_number"]."<input type='hidden' name='room_no' value='".$row["room_number"]."'></td><td><br>";
        
    echo "<a> Number of nights: </a>";
	echo $row["no_of_nights"]."<input type='hidden' name='no_of_nights' value='".$row["no_of_nights"]."'></td><td><br>";
        
    echo "<a> Price: </a>";
	echo $row["price"]."<input type='hidden' name='price' value='".$row["price"]."'></td><td><br>";
        
    echo "<a> Payment Method: </a>";
	echo $row["method"]."<input type='hidden' name='method' value='".$row["method"]."'></td><td><br>";
        
    echo "<a> Arrival: </a>";
	echo $row["start_date"]."<input type='hidden' name='arrival' value='".$row["start_date"]."'></td><td><br>";
        
    if ($_SESSION["logintype"] == "guest"){
        echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Manage Booking </button><br><br>";
        
    }    

	echo "</form>";
    echo "</div>";

    
}

