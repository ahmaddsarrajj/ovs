<?php
include ('../Logic/Connection.php');

$listID = $_GET['listId'];

$delete_list_query = "DELETE FROM `list` WHERE ID = ". $listID;
$delete_list =  mysqli_query($conn,$delete_list_query);


header("Location: ../light/list.php");
exit();


?>