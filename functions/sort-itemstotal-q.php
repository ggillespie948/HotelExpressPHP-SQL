<?php

$query = "SELECT * from service_view order by no_of_items desc";

$result = mysql_query($query, $db);
// display the result


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

    echo "<div id='result-entry'>";
	echo "<form action=\"../functions/complete-order.php\" method=\"POST\">";
    echo "<br><br>";
    echo "<img src=\"http://png.clipart.me/graphics/thumbs/160/vector-bell-icon-symbol_160927589.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";
    
    echo "<a> Order ID: </a>";
	echo $row["order_id"]."<input type='hidden' name='order_id' value='".$row["order_id"]."'></td><td><br>";

    echo "<a> Guest Booking Email: </a>";
    echo $row["email_address"]."<br>";

    echo "<a> Payment ID: </a>";
	echo $row["payment_id"]."<br>";
        
    echo "<a> Room number: </a>";
	echo $row["room_number"]."<br>";

    echo "<a> Item(s): </a>";
	echo $row["item"]."<br>";
        
    echo "<a> Total Item(s): </a>";
	echo $row["no_of_items"]."<br>";
        
    echo "<a> Time of order: </a>";
	echo $row["open_time"]."<br>";
        
    echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Complete order </button><br><br>";

	echo "</form>";
    echo "</div>";

    
}

