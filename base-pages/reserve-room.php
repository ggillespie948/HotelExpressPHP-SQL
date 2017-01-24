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
    header('Location: login.php');
}
$current_page = "view-rooms";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

/* Get booking form variables */

/* room variables */
$room_no = $_POST["room_no"];
$room_type = $_POST["room_type"];
$room_floor = $_POST["floor_no"];
$room_feat = $_POST["features"];
$price = $_POST["price_per_night"];

$hotelid = $_POST["hotel_id"];

$day = $_POST["day"];
$month = $_POST["month"];
$year = $_POST["year"];
$nights = $_POST["nights"];

/* hotel variables *********** replace with php script which fetches hotel variables? */


echo "<div id='main-content'>";
echo "<div id='center-content'>";

echo "<h2> Make your reservation </h2>";
echo "<h3> Review your account details, booking history and current bookings below. </h3> </br>";

if (isset($_SESSION["errormsg"])) {
    $error = $_SESSION["errormsg"];
    session_unset($_SESSION["errormsg"]);

    echo "<div id='errormessage'>";
    echo $error;
    echo "</div>";

} else {
    $error = "";
}

echo "<h6> Your room </h6><br><br>";
echo "<div id='result-entry'>";
	echo "<form action=\"reserve-room.php\" method=\"POST\">";
    echo "<br><br>";
    echo "<img src=\"https://modishmale.com/wp-content/uploads/2016/07/tshukudu-3-150x150.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";
    echo "<a> Room number: </a>";
	echo $room_no;

    echo "<a> Room Type: </a>";
    echo $room_type;

    echo "<a> Room Floor: </a>";
	echo $room_floor;

    echo "<a> Room Features: </a>";
	echo $room_feat;

    echo "<a> Room Price Per Night: </a>";
	echo $price;
	echo "</form>";
    echo "</div>";


echo "<h6> Your hotel </h6><br>";
include "../functions/get-hotel-details.php";


if($_SESSION["logintype"]=="guest" || $_SESSION["new_guest_reg"]=="true"  ){
    echo "<h6> Confirm your booking </h6><br>";
        include "../functions/get-account-details-booking.php";
} else {
    echo "<h6> New Guest Account </h6>";
	include "../html/employee-new-guest-reservation.html";
}

include "../html/room-payment-form.html";

        $bid = 1;
        $employeeid = 1;
        $no_of_guests = 1;
        $requests = "3";
        $email = "example@email.com";
        


echo "<input type='hidden' name='booking_id' value='".$bid."'>";
if($_SESSION["logintype"]=="guest"){
    echo "<input type='hidden' name='email_address' value='".$_SESSION["email"]."'></td><td><br>";
    echo "<input type='hidden' name='employee_id' value='".$employeeid."'></td><td><br>";
} else {
    echo "<input type='hidden' name='email_address' value='".$email."'></td><td><br>";
    echo "<input type='hidden' name='employee_id' value='".$_SESSION["employee_id"]."'></td><td><br>";
}
echo "<input type='hidden' name='room_number' value='".$room_no."'></td><td><br>";
echo "<input type='hidden' name='price' value='".$price."'></td><td><br>";
echo "<input type='hidden' name='no_of_guests' value='".$no_of_guests."'></td><td><br>";
echo "<input type='hidden' name='requests' value='".$requests."'></td><td><br>";
echo "<input type='hidden' name='start_date' value='".$year."-".$month."-".$day."'></td><td><br>";
echo "<input type='hidden' name='no_of_nights' value='".$nights."'></td><td><br>";
echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Book now </button><br><br>";
echo "</form>";

echo "</div>";
echo "</div>";

include "../html/footer.html";