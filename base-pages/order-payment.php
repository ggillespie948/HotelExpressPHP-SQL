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
$current_page = "view-rooms";

echo "<script>";
echo "document.getElementById(\"" . $current_page . "\").style.color = \"#009DD9\"";
echo "</script>";

/* Get booking form variables */

/* booking variables */
$food = $_POST["food"];
$foodqty = $_POST["foodqty"];

$drink = $_POST["drink"];
$drinkqty = $_POST["drinkqty"];

$extra = $_POST["extra"];
$extraqty = $_POST["extraqty"];

$booking_id = $_POST["booking_id"];
$room_no = $_POST["room_no"];


echo "<div id='main-content'>";
echo "<div id='center-content'>";

echo "<h2> Your order </h2>";
echo "<h3> Review the order details below </h3> </br>";

if (isset($_SESSION["errormsg"])) {
    $error = $_SESSION["errormsg"];
    session_unset($_SESSION["errormsg"]);

    echo "<div id='errormessage'>";
    echo $error;
    echo "</div>";

} else {
    $error = "";
}

$total_price = 0.00;

if ($food == "pizza" || "steak"){
    $total_price += 7.99 * $foodqty;
    
} else if ($food == "chicken-salad") {
    $total_price += 5.99 * $foodqty;
} else  if ($food != "select") {
    $total_price += 2.99 * $foodqty;
}

if ($drink == "red-wine" || "white-wine"){
    $total_price += 11.99 * $drinkqty;
    
}else if ($drink != "select") {
    $total_price += 1.99 * $drinkqty;
}

if ($extra == "hot-towel"){
    $total_price += 2.50 * $extraqty;
    
}else if ($extra != "select") {
    $total_price += 6.99 * $extraqty;
}


echo "<div id='form-container'>";
echo "<h6> Item Summary </h6>";
echo "<h3> $food X $foodqty </h3><br>";
echo "<h3> $drink X $drinkqty </h3><br>"; 
echo "<h3> $extra X $extraqty </h3><br>"; 
echo "<h3> Total: £".$total_price."</h3>";
echo "</div>";

include "../html/payment-form.html";

$payment_id = rand(1, 500);

//For adding payment instance    
echo "<input type='hidden' name='payment_id' value='".$payment_id."'></td><td><br>";
echo "<input type='hidden' name='booking_id' value='".$booking_id."'></td><td><br>";
echo "<input type='hidden' name='email_address' value='".$_SESSION["email"]."'></td><td><br>";
echo "<input type='hidden' name='price' value='".$total_price."'></td><td><br>";

//For adding order instance
$order_id = rand(1, 500);
$item_qty = $foodqty + $drinkqty + $extraqty;

if($food != "select" || $drink != "select" || $extra != "select"){
    $items = $food."(".$foodqty.")".$drink."(".$drinkqty.")".$extra."(".$extraqty.")";
    
} else {
    if ($food == "select"){
        $food = "";
    }
    if ($drink == "select"){
        $drink = "";
    }
    
    if ($extra == "select"){
        $extra = "";
    }
    
}

$items = $food."(".$foodqty.")".$drink."(".$drinkqty.")".$extra."(".$extraqty.")";

echo "<input type='hidden' name='order_id' value='".$order_id."'></td><td><br>";
echo "<input type='hidden' name='room_no' value='".$room_no."'></td><td><br>";
echo "<input type='hidden' name='items' value='".$items."'></td><td><br>";
echo "<input type='hidden' name='itemqty' value='".$item_qty."'></td><td><br>";

echo "<button style=\"float:right; margin-bottom: -10%;\" id=\"button\"> Confirm order </button><br><br>";



echo "</div>";
echo "</div>";

include "../html/footer.html";