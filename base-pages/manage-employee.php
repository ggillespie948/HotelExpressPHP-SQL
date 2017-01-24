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
$current_page = "employees";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

/* employee basic variables */

$employee_id = $_POST["employee_id"];
$firstname = $_POST["first_name"];
$surname = $_POST["surname"];
$drecord = $_POST["disciplinary_record"];
$role = $_POST["role"];
$salary = $_POST["salary"];

echo "<div id='main-content'>";
echo "<div id='center-content'>";

echo "<h2> Manage Employee </h2>";
echo "<h3> Add a disciplinary, and review employee details below </h3> </br>";

echo  "<div id='form-container'>";
echo "<h6> Employee Quick-View </h6>";
echo "<h5> First Name: ".$firstname."</h5>";
echo "<h5> Surname: ".$surname."</h5>";
echo "<h5> Role: ".$drecord."</h5>";
echo "<h5> Salary: ".$salary."</h5>";
echo "<h5> Employee ID: ".$employee_id."</h5>";
echo "";
echo "</div>";

echo  "<div id='form-container'>";
echo "<a> Current Disciplinary record </a><br>";
echo "<br>";
echo " <h4> Current Record: </h4> <br>".$drecord."<br><br>";
echo " <h4> Update record: </h4> <br>";
include "../html/disciplinary-form.html";
echo "<input type=\"hidden\" name=\"employee_id\" value='$employee_id'><br>";
echo "<input type=\"submit\" value=\"Submit\" style=\"float:right\">";
echo "</form>";
echo "</div>";




echo "</div>";
echo "</div>";

include "../html/footer.html";