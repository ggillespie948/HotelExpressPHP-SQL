<?php

session_start();

include "../dbsqli.php";

//Define variables and init
$bookingid = $email = $employee_id = $room_number = $method = $price = $no_of_guests = $requests = $start_date = $nights = "";

//Get payment values
$bookingid = $_POST["booking_id"];
$paymentid = $_POST["payment_id"];
$email = $_POST["email_address"];
$price = $_POST["price"];
$method = $_POST["payment_method"];


if ($method == "cash") {
    $amount_paid = 0.00;
    $left_to_pay = $price;
} else {
    $amount_paid = $price;
    $left_to_pay = 0.00;  
}

if ($method == "card"){
    $method = "debit card";
}

$discounts = 0.00;

//order values
$order_id = $_POST["order_id"];
$room_no = $_POST["room_no"];
$items = $_POST["items"];
$itemsqty = $_POST["itemqty"];

$start_time = "09:00:00";
$close_time = "09:00:00";


//ADD TRANSACTION
$sql = "INSERT INTO payment (payment_id, booking_id, email_address, method, price, amount_paid, left_to_pay, discounts)
VALUES ('$paymentid', '$bookingid', '$email', '$method', '$price', '$amount_paid', '$left_to_pay', '$discounts');";

$sql .= "INSERT INTO service (order_id, email_address, payment_id, room_number, item, no_of_items, open_time, close_time)
VALUES ('$order_id', '$email', '$paymentid', '$room_no', '$items', '$itemsqty', '$start_time', '$close_time');";


if ($mysqli->multi_query($sql)) {
    $_SESSION["msg"] = "Thank you for your order, it will arrive shortly.";
    header('Location: ../base-pages/myaccount.php');
} else {
    die('Error: ' . mysql_error());

    
    
    
    

    
    
// CLOSE CONNECTION
mysql_close($db);
} 