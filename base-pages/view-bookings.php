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
$current_page = "view-bookings";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

echo "<div id='main-content'>";
include "../html/booking-searchbar.html";
echo "<div id='search-content'>";

/* Get method variables */ 
$location = "select";
$arrival = "select";
$nights = "select";
$roomtype = "select";


/* TAKE BELOW CODE AND ADD TO SEARCH ROOM.PHP */
include "../db.php";

$URL = $_SERVER['REQUEST_URI'];

if ($URL == "/2016-ac32006/garygillespie/team16/base-pages/view-bookings.php"){
    include "../functions/view-all-bookings-q.php";  
} else {
    if(isset($_GET["sort"])) {
    // id index exists
        $sort = $_GET["sort"];
        
        if ($sort == "price"){
            include "../functions/sort-bookingprice-q.php";

        } else if ($sort == "arrival"){
            include "../functions/sort-arrival-q.php";

        } else if ($sort == "#"){
            include "#";
        }

        }

    
} 


//echo $query;


echo "<br>Done.<br>";
// CLOSE CONNECTION
mysql_close($db);

echo "</div>";
echo "</div>";

include "../html/footer.html";