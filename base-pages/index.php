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

//Highlight current page in navigation bar
$current_page = "home";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

echo "<div id='main-content'>";
echo "<div id='center-content'>";

if (isset($_SESSION["loggedIn"])) {
    $first_name = $_SESSION["first_name"];
    echo "<h2> Welcome " . $first_name . ",</h2>";
} else {
    echo "<h2> (~Not logged in) Welcome </h2>";
}
echo "<h3> This is the hotel management dashboard. </h3><br>";


echo "<h6>Our Locations:</h6>";


    include "../html/ourlocations.html";

echo "<br><h6>Room search:</h6>";
echo "<div id=summarybox>";
echo "<br><button id='button'> Search all rooms </button>";
echo "<button id='button'> Search Dundee Rooms </button>";
echo "<button id='button'> Search Edinburgh Rooms </button><br><br>";
echo "</div>";


echo "</div>";
echo "</div>";

include "../html/footer.html";
