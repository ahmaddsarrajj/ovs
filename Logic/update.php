<?php
include '../Logic/Connection.php';



if(isset($_GET['start'])) {


    $update_program = "UPDATE celebration SET STARTDATE = '1'";
  $election_program = mysqli_query($conn, $update_program);


    header("location: ../light/index.php");
    exit();
}

if(isset($_GET['end'])) {


    $update_program = "UPDATE celebration SET ENDED = '1'";
  $election_program = mysqli_query($conn, $update_program);

    header("location: ../light/index.php");
    exit();
}

?>