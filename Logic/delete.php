<?php
include ('../Logic/Connection.php');
session_start();

$user = $_SESSION["USER"];

if (!empty($_GET['leave'])) {
    $leave_query = "UPDATE `user` SET `LISTID`= NULL WHERE ID= ". $_GET['leave'];
    $leave_list =  mysqli_query($conn,$leave_query);
    unset($user['LISTID']);
    $user['LISTID'] = NULL;

    if (empty($user['LISTID'])) {
        header("Location: ../light/list.php");
        exit();
    }
}

if (!empty($_GET['c_rejects'])) {
    $leave_query = "DELETE FROM `nomrequest` WHERE ID= ". $_GET['c_rejects'];
    $leave_list =  mysqli_query($conn,$leave_query);
    header("Location: ../light/candidate.php");
    exit();
}





?>