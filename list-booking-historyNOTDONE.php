<?php
session_start();

if (isset($_SESSION["loggedIn"])) {
    include "guestheader.html";
    include "guestnavbar.html";

} else {
    include "header.html";
    include "navbar.html";
}
$current_page = "view-rooms";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

echo "<div id='main-content'>";
include "searchbar.html";
echo "<div id='search-content'>";
echo "<h2> Search Results</h2>";
include "db.php";

// select statement
$query = "SELECT * FROM ROOM WHERE availability=1";

$result = mysql_query($query, $db);
// display the result

//Get infromation from search


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

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

    echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Book now </button><br><br>";

	echo "</form>";
    echo "</div>";

    //echo $row["room_number"]." </td><td>".$row["room_type"]." </td><td>".$row["price_per_night"]." </td><td>".$row["features"]." </td><td>".$row["availability"]." </td><td>";
    //echo $row["r"]." </td><td>".$row["Surname"]
}
echo "<br>Done.<br>";

echo "</div>";
echo "</div>";

include "footer.html";