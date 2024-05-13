<?php
include ('./Connection.php');

$list_id = $_GET['list_id'];

$update_accepted_query = "UPDATE `list` SET `ACCEPTED`= 1 WHERE ID = $list_id";
$update_list =  mysqli_query($conn,$update_accepted_query);

if($update_list) {
    header("Location: ../light/list.php");
    exit();
}

?>