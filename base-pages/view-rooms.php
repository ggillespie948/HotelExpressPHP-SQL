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
$current_page = "view-rooms";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

echo "<div id='main-content'>";
include "../html/searchbar.html";
echo "<div id='search-content'>";

/* Get method variables */ 
$location = "select";
$arrival = "select";
$nights = "select";
$roomtype = "select";


/* TAKE BELOW CODE AND ADD TO SEARCH ROOM.PHP */
include "../db.php";

$URL = $_SERVER['REQUEST_URI'];


if ($URL == "/2016-ac32006/garygillespie/team16/base-pages/view-rooms.php"){
    $query = "SELECT * FROM room_view";
    $day = "";
    $month = "";
    $year = "";
    $nights = "";

} else {
    $location = $_GET["location"];
    $roomtype = $_GET["roomtype"];
    $day = $_GET["arrivalDay"];
    $month = $_GET["arrivalMonth"];
    $year = $_GET["arrivalYear"];
    $nights = $_GET["nights"];

    if ($location !="select" && $roomtype !="select"){
        $query = "SELECT * FROM room_view where hotel_id='$location' AND room_type='$roomtype'";
    } else if ($location !="select" && $roomtype ="select"){
        $query = "SELECT * FROM room_view where hotel_id='$location'";
    }else  if ($location =="select" && $roomtype !="select"){
        $query = "SELECT * FROM room_view where room_type='$roomtype'";
    } else {
        $query = "SELECT * FROM room_view";
    }
        
    
} 


$result = mysql_query($query, $db);
// display the result

//Define and initialise search variables


if ($day == "" || $month == "" || $year == "" || $day == "- Day -" || $month == "- Month -" || $year == "- Year -" || $nights == "" || $nights =="select"){
        echo "<h3> Please select an arrival date and number of nights stay to view the available rooms. </h3> <br>";
} else {
    echo "<h4> Rooms available on: $day, $month, $year </h4>";

    while ($row = mysql_fetch_array($result)) {
        echo "<div id='result-entry'>";
        echo "<form action=\"reserve-room.php\" method=\"POST\">";
        echo "<br><br>";
        echo "<img src=\"https://modishmale.com/wp-content/uploads/2016/07/tshukudu-3-150x150.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";
        echo "<a> Room number: </a>";
        echo $row["room_number"] ."<input type='hidden' name='room_no' value='".$row["room_number"]."'></td><td><br>";

        echo "<a> Room Type: </a>";
        echo $row["room_type"] ."<input type='hidden' name='room_type' value='".$row["room_type"]."'></td><td><br>";

        echo "<a> Room Floor: </a>";
        echo $row["floor_number"] ."<input type='hidden' name='floor_no' value='".$row["floor_number"]."'></td><td><br>";

        echo "<a> Room Features: </a>";
        echo $row["features"] ."<input type='hidden' name='features' value='".$row["features"]."'></td><td><br>";

        echo "<a> Room Price Per Night: </a>";
        echo $row["price_per_night"] ."<input type='hidden' name='price_per_night' value='".$row["price_per_night"]."'></td><td><br>";

        echo "<input type='hidden' name='hotel_id' value='".$row["hotel_id"]."'></td><td><br>";

        echo "<input type='hidden' name='hotel_id' value='".$row["hotel_id"]."'></td><td><br>";

        echo "<input type='hidden' name='day' value='".$day."'></td><td>";
        echo "<input type='hidden' name='month' value='".$month."'></td><td>";
        echo "<input type='hidden' name='year' value='".$year."'></td><td>";
        echo "<input type='hidden' name='nights' value='".$nights."'></td><td>";

        echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Book now </button><br><br>";

        echo "</form>";
        echo "</div>";



}
    

}

// CLOSE CONNECTION
mysql_close($db);

echo "</div>";
echo "</div>";

include "../html/footer.html";