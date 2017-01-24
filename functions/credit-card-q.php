<?php

$query = "Select payment.email_address, payment.method, service.item
From payment
Inner JOIN service
On payment.email_address = service.email_address
WHERE payment.method = 'debit card'";

$result = mysql_query($query, $db);
// display the result


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

    echo "<div id='result-entry'>";
	echo "<form action=\"../functions/complete-order.php\" method=\"POST\">";
    echo "<br><br>";
    echo "<img src=\"http://png.clipart.me/graphics/thumbs/160/vector-bell-icon-symbol_160927589.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";
    
    
    echo "<a> Guest Booking Email: </a>";
    echo $row["email_address"]."<br>";

    echo "<a> Item(s): </a>";
	echo $row["item"]."<br>";
        
    echo "<a> Payment Method: </a>";
	echo $row["method"]."<br>";

        
    echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Complete order </button><br><br>";

	echo "</form>";
    echo "</div>";

    
}

