<?php
$localhost = "localhost"; //your host name
$username = "lizodus"; // your database name
$password = "Lizgs123"; // your database password
$dbname = "marketplace";

$con = new mysqli($localhost, $username, $password, $dbname);


if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
}


/* end of file */
?>
