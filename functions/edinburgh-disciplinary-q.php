<?php

$query = "SELECT employees.first_name, employees.surname, employees.disciplinary_record, employees.employee_id, hotel.hotel_id, hotel.city
 From employees
 INNER JOIN hotel
 On employees.city = hotel.city
 WHERE hotel.city = \"Edinburgh\" 
 And employees.disciplinary_record != 'clear'";

$result = mysql_query($query, $db);
// display the result


while ($row = mysql_fetch_array($result)) {
    echo "<br>";

    echo "<div id='result-entry'>";
    echo "<form action=\"manage-employee.php\" method=\"POST\">";
    echo "<br><br>";
    echo "<img src=\"https://cyc.berkeley.edu/img/expert-icon.jpg\" alt=\"HTML5 Icon\" style=\"width:150px;height:150px;\"><br><br>";

    echo "<a> Employee ID: </a>";
    echo $row["employee_id"]."<br>";

    echo "<a> First Name: </a>";
    echo $row["first_name"]."<br>";

    echo "<a> Surname: </a>";
    echo $row["surname"]."<br>";

    echo "<a> Disciplinary Record: </a>";
    echo $row["disciplinary_record"]."<br>";

    echo "<a> Hotel ID: </a>";
    echo $row["hotel_id"]."<br>";

    echo "<a> City: </a>";
    echo $row["city"]."<br>";



    echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Manage Employee </button><br><br>";

    echo "</form>";
    echo "</div>";

}

