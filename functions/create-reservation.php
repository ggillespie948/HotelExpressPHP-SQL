<?php
include "../db.php";

//Define variables and init
$bookingid = $email = $employee_id = $room_number = $method = $price = $no_of_guests = $requests = $start_date = $nights = "";

//Get and validate values
$bookingid = $_POST["booking_id"];
$email = $_POST["email_address"];
$employee_id = $_POST["employee_id"];
$room_number = $_POST["room_number"];
$method = $_POST["payment_method"];
$price = $_POST["price"];
$no_of_guests = $_POST["no_of_guests"];
$requests = $_POST["requests"];
$start_date = $_POST["start_date"];
$no_of_nights = $_POST["no_of_nights"];




$bookingid = rand(1, 500);
echo $bookingid;



//ADD TRANSACTION
$sql = "INSERT INTO booking (booking_id, email_address, employee_id, room_number, method, price, no_of_guests, requests, start_date, end_date, no_of_nights)
VALUES ('$bookingid', '$email', '$employee_id', '$room_number', '$method', '$price', '$no_of_guests', '$requests', '$start_date', '$start_date', '$no_of_nights')";
if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
} else {
    echo "New guest added.<br>";
    $_SESSION["msg"] ="Booking successful! Thanks for your order.";
    header('Location: ../base-pages/myaccount.php');

    
    
// CLOSE CONNECTION
mysql_close($db);
} ?>