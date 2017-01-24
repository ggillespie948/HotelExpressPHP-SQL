<?php
include "../db.php";

//Define variables and init
$firstname = $surname = $address = $postcode = $telephone = $username = $password = $email = "";

//Get and validate values
$firstname = $_POST["firstname"];
$surname = $_POST["surname"];
$dob = $_POST["dob"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$telephone = $_POST["telephone"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];


//ADD TRANSACTION

$sql = "INSERT INTO guest (email_address, first_name, surname, dob, username, password, telephone_no, address, city, postcode) VALUES ('$email', '$firstname', '$surname', '$dob', '$username', '$password', '$telephone', '$address', '$city', '$postcode')";
if (!mysql_query($sql)) {
    die('Error: ' . mysql_error());
} else {
    echo "New guest added.<br>";
    header('Location: ../base-pages/login.php');

    
    
    // CLOSE CONNECTION
mysql_close($db);
} ?>