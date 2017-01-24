<?php
session_start();

include "../db.php";

$orderid = $_POST["order_id"];

$query = "DELETE from service WHERE order_id ="."$orderid.";

if (!mysql_query($query)) {
    die('Error: ' . mysql_error());
} else {
    echo "order-complete <br>";
    $_SESSION["msg"] = "Order completed!";
    header('Location: ../base-pages/orders.php');
}


