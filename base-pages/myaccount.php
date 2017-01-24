<?php
session_start();

if (isset($_SESSION["loggedIn"])) {
    if($_SESSION["logintype"]=="employee"){
        
        include "../html/guestheader.html";
        include "../html/employeenavbar.html";
    
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
$current_page = "myaccount";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

echo "<div id='main-content'>";
echo "<div id='center-content'>";

if (isset($_SESSION["msg"])) {
    $msg = $_SESSION["msg"];
    unset($_SESSION["msg"]);

    echo "<div id='errormessage'>";
    echo $msg;
    echo "</div>";

} else {
    $msg = "";
}

echo "<h2> Your Account </h2>";
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



if($_SESSION["logintype"]=="employee"){
    echo "<h6> Employee Account </h6>";
    
} else {
echo "<h6> Account details </h6><br>";
include "../functions/get-account.php";
echo "<h6> Contact details </h6><br>";
include "../functions/get-account-details.php";
echo "<h6> Booking history </h6><br>";
include "../functions/get-booking-history.php"; 
}

echo "</div>";
echo "</div>";

include "../html/footer.html";