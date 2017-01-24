<?php

session_start();
include "../dbsqli.php";

$username = $_POST["username"];
$password = $_POST["password"];
$sessionpassword = $_SESSION["password"];
$newpassword = $_POST["newpassword"];

echo $username;
echo $password;
echo $sessionpassword;
echo $newpassword;

if ($password === $sessionpassword){
	// update statement
$query = 'SET SQL_SAFE_UPDATES=0;';

$query .="UPDATE guest SET password='".$newpassword."' WHERE username='".$username."' AND password='".$password."';";

$query .= 'SET SQL_SAFE_UPDATES=1;';


if($mysqli->multi_query($query)){
	echo "success";
	$_SESSION["errormsg"] = "Password successfully updated";
	header('Location: ../base-pages/login.php');
	
} else {
	echo "failure";
	$_SESSION["errormsg"] = "Password update failed! - Check password ( ! )";
	header('Location: ../base-pages/myaccount.php');
	
}
	
} else {
	$_SESSION["errormsg"] = "Password update failed - old password incorrect - login to continue ( ! )";
	header('Location: ../base-pages/login.php');

}




/* close connection */
$mysqli->close();
?>
    


