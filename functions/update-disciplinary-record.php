<?php

session_start();
include "../dbsqli.php";

$drecord = $_POST["drecord"];
$employee_id = $_POST["employee_id"];

echo $drecord;
echo $employee_id;

	// update statement
$query = 'SET SQL_SAFE_UPDATES=0;';

$query .="UPDATE employee_view SET disciplinary_record='".$drecord."' WHERE employee_id='".$employee_id."';";

$query .= 'SET SQL_SAFE_UPDATES=1;';


if($mysqli->multi_query($query)){
	echo "success";
	$_SESSION["errormsg"] = "disciplinary record successfully updated";
	header('Location: ../base-pages/employees.php');
	
} else {
	echo "failure";
	$_SESSION["errormsg"] = "Disciplinary record update failed.";
	header('Location: ../base-pages/employees.php');	
}


/* close connection */
$mysqli->close();
?>
    


