<?php
session_start();
include "../db.php";

//Get username and password
$username = $_POST['username'];
$password = $_POST['password'];

echo $username;
echo $password;

//SQL - Custome login check
$sql = "SELECT * FROM guest WHERE username='$username' and password='$password';";


$result = mysql_query($sql);

$resultcount = mysql_num_rows($result);


if ($resultcount == 1) {
    //Login record match
    echo "Login succesful";
    //Assign session variables
    while ($row = mysql_fetch_array($result)) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["logintype"] = "guest";
        $_SESSION["username"] = $row['username'];
		$_SESSION["password"] = $row['password'];
        $_SESSION["email"] = $row['email_address'];
        $_SESSION["first_name"] = $row['first_name'];
    }


    $_SESSION["message"] = "Logged In Successfully.";
    header('Location: ../base-pages/index.php');
    return true;
} else {
    echo "Login failed";
    // CLOSE CONNECTION
    mysql_close($db);
    $_SESSION["tempUsername"] = $username;
    $_SESSION["tempPassword"] = $password;
    header('Location: login-check-employee.php');
    //return false;
}


// CLOSE CONNECTION
mysql_close($db);

?>