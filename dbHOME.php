<?php
//echo "Starting connection ...<br>";
// CONNECT TO DATABASE - use your own username and password
$db = mysql_connect("localhost:3306", "root");
// SELECT DATABASE - use your own database name
mysql_select_db("16ac3d01");
if(!$db){
echo mysql_error() ;
}
else{
//echo "Successfully connected. <br>";
}

?>