<?php
//echo "Starting connection ...<br>";

// CONNECT TO DATABASE - use your own username and password
//mysqli
$mysqli = new mysqli("silva.computing.dundee.ac.uk", "16ac3u01",
"132acb", "16ac3d01");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>