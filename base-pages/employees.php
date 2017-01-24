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
$current_page = "employees";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

echo "<div id='main-content'>";
include "../html/employee-searchbar.html";
echo "<div id='search-content'>";

/* Get method variables */ 
$sort = "select";
$a_query = "select";

/* TAKE BELOW CODE AND ADD TO SEARCH ROOM.PHP */
include "../db.php";

$URL = $_SERVER['REQUEST_URI'];

if ($URL == "/2016-ac32006/garygillespie/team16/base-pages/employees.php"){
    include "../functions/view-all-employees-q.php"; 
} else {
    
    if(isset($_GET["a-query"])) {
    // id index exists
        $a_query = $_GET["a-query"];
        
        if ($a_query == "dundee-disciplinary"){
            include "../functions/dundee-disciplinary-q.php";

        } else if ($a_query == "edinburgh-disciplinary"){
            include "../functions/edinburgh-disciplinary-q.php";

        } else if ($a_query == "top-earners"){
            include "../functions/top-earners-q.php";

        }
        
        
    } else if(isset($_GET["sort"])) {
    // id index exists
        $sort = $_GET["sort"];
        
        if ($sort == "salary"){
            include "../functions/sort-all-salary-q.php";

        } else if ($sort == "dateofemploy"){
            include "../functions/sort-all-doe-q.php";

        } 
        
        
    }
    
    
    
    //Advanced query
    
    

    


}


echo "<br>Done.<br>";
// CLOSE CONNECTION
mysql_close($db);

echo "</div>";
echo "</div>";

include "../html/footer.html";