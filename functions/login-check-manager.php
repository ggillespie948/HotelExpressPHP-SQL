<?php
session_start();
include "../db.php";

//Get temp username and password
$username = $_SESSION["tempUsername"];
$password = $_SESSION["tempPassword"];

echo $username;
echo $password;

//SQL - Custome login check
$sql = "SELECT * FROM manager WHERE username='$username' and password='$password'";
$result = mysql_query($sql);

$resultcount = mysql_num_rows($result);


if ($resultcount == 1) {
    //Login record match
    echo "Login succesful";
    //Assign session variables
    while ($row = mysql_fetch_array($result)) {
        $_SESSION["loggedIn"] = true;
		$_SESSION["logintype"] = "manager";
        $_SESSION["username"] = $row['username'];
		$_SESSION["password"] = $row['password'];
        $_SESSION["first_name"] = $row['first_name'];
    }
    $_SESSION["message"] = "Logged In Successfully.";
    header('Location: ../base-pages/index.php');
    return true;
} else {
    echo "Login failed";
    $_SESSION["errormsg"] = "Incorrect username/password ( ! )";
    header('Location: ../base-pages/login.php');
    return false;
}


// CLOSE CONNECTION
mysql_close($db);

?>