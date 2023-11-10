<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db1";
$conn = new mysqli($servername, $username, $password, $db_name, 3306);
if($conn->connect_error){
    die("Error connecting".$conn->connect_error);
}
echo "";
?>
