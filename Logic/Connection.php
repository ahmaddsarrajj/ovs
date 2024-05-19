<?php
$server= "localhost";
$username= "root";
$password= "";
$db_name= "ovs";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    echo "Connection failed!"; 
}

?>