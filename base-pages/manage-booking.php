<?php
session_start();

if (isset($_SESSION["loggedIn"])) {
    if($_SESSION["logintype"]=="employee"){
        
        include "..//html/guestheader.html";
        include "..//html/employeenavbar.html";
    
    } else if($_SESSION["logintype"]=="manager"){
        include "../html/guestheader.html";
        include "../html/managernavbar.html";
    
    } else if($_SESSION["logintype"]=="guest"){
        include "../html/guestheader.html";
        include "../html/guestnavbar.html";
    }

} else {
    include "../html/header.html";
    include "../html/navbar.html";
}
$current_page = "view-rooms";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

/* Get booking form variables */

/* booking variables */
$booking_id = $_POST["booking_id"];
$email = $_POST["email_address"];
$no_of_guests = $_POST["no_of_guests"];
$employee_id = $_POST["employee_id"];
$room_no = $_POST["room_no"];
$no_of_nights = $_POST["no_of_nights"];
$price = $_POST["price"];
$method = $_POST["method"];
$arrival = $_POST["arrival"];


$hotelid = 1;

/* hotel variables *********** replcase with php script which fetches hotel variables? */

echo "<div id='main-content'>";
echo "<div id='center-content'>";

echo "<h2> Manage Booking </h2>";
echo "<h3> Review the booking details below </h3> </br>";

if (isset($_SESSION["errormsg"])) {
    $error = $_SESSION["errormsg"];
    session_unset($_SESSION["errormsg"]);

    echo "<div id='errormessage'>";
    echo $error;
    echo "</div>";

} else {
    $error = "";
}

if($_SESSION["logintype"]=="employee"){
        echo "<h6> Guest's room </h6><br>";
} else {
        echo "<h6> Place an order </h6>";
        include "../html/order-form.html";
        echo "<input type='hidden' name='booking_id' value='".$booking_id."'></td><td>";
	echo "<input type='hidden' name='room_no' value='".$room_no."'></td><td>";
	echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Continue to payment </button><br><br>";
	echo "<form>";
        echo "</div>";
        echo "<h6> Your room </h6><br><br>"; 
}

echo "<div id='result-entry'>";
	echo "<form action=\"reserve-room.php\" method=\"POST\">";
    echo "<br><br>";
    echo "<img src=\"https://modishmale.com/wp-content/uploads/2016/07/tshukudu-3-150x150.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";
    echo "<a> Room number: </a>";
	echo $room_no;


    echo "<a> Room Price Per Night: </a>";
	echo $price;
	echo "</form>";
    echo "</div>";


include "../functions/get-hotel-details.php";

if($_SESSION["logintype"]=="employee"){
        echo "<h6> Guest's hotel </h6><br>";
} else {
    
}

if($_SESSION["logintype"]=="employee"){
    echo "<h6> Guest's payment method  </h6>";
} else {
    
}


echo "</div>";
echo "</div>";

include "../html/footer.html";