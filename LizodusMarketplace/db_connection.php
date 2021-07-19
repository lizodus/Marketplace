
<?php 

// $localserver = "localhost";
// $db_user = "root";
// $db_password = "";
// $db_name = "marketplace";

// $connection = new mysqli($localserver, $db_user, $db_password, $db_name);

// connecting online
$db_host = "localhost"; //your host name
$db_user = "id17263852_admin"; // your database name
$db_password = "CJCBF)&,w-Yn^!2"; // your database password
$db_name = "id17263852_lizodusmarketplace";

$con = new mysqli($db_host, $db_user, $db_password, $db_name);

if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
}


/* end of file */
?>

?>
