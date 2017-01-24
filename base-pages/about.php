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
$current_page = "about";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

echo "<div id='main-content'>";
echo "<div id='center-content'>";

echo "<h2> Select a branch: </h2>";
include "../html/policy-form.html";


echo "</div>";
echo "</div>";

include "../html/footer.html";