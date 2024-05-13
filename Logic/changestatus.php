<?php


include('../Logic/Connection.php');

    if($exam = $_GET['exam']){
        $update_exam_query = "UPDATE nomrequest SET EXAM = 1 WHERE ID = '$exam'";
        mysqli_query($conn, $update_exam_query);
    }

    if($paid = $_GET['paid']){
        $update_paid_query = "UPDATE nomrequest SET ISPAID = 1 WHERE ID = '$paid'";
        mysqli_query($conn, $update_paid_query);
    }

    if($accepted = $_GET['accepted']){
        $userId = $_GET['userId'];

        $update_accepted_query = "UPDATE nomrequest SET ACCEPTED = 1 WHERE ID = '$accepted'";
        mysqli_query($conn, $update_accepted_query);

        $be_candidate_query = "UPDATE user SET ROLEID = 1 WHERE ID= '$userId'";
        mysqli_query($conn, $be_candidate_query);

        $add_empty_program_query = "INSERT INTO `electionprogram`(`PROFILE`, `DESCRIPTION`, `WEBSITE`, `USERID`) VALUES ('','','','".$userId."')";
        mysqli_query($conn, $add_empty_program_query);
    }



    header("Location: ../light/candidate.php");
    exit();


?>