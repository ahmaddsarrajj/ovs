<?php

session_start();
$user = $_SESSION['USER'];

include("../logic/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the form data
  $program_id = $_POST['program_id'];
  $descriptions = $_POST['description'];
  $website = $_POST['website'];

  if(!empty($_POST['facebook_id'])) {
  $facebook_id= $_POST['facebook_id'];
  }

  if(!empty($_POST['instagram_id'])) {
    $instagram_id= $_POST['instagram_id'];
  }

  if(!empty($_POST['x_id'])) {
  $x_id= $_POST['x_id'];
  }

  if(!empty($_POST['linkedin_id'])) {
  $linkedin_id= $_POST['linkedin_id'];
  }

  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $old_password = $_POST['old_password'];


  // Perform database update
  $update_program = "UPDATE electionprogram SET DESCRIPTION = '$descriptions', WEBSITE = '$website' WHERE ID =". $program_id;
  $election_program = mysqli_query($conn, $update_program);


  if(!empty($_POST['facebook'])) {
  $url_facebook = $_POST['facebook'];
  
    if(!empty($_POST['facebook_id'])){
      $update_url_facebook = "UPDATE url SET SRC = '$url_facebook' WHERE ID =". $facebook_id;
      $url_fac = mysqli_query($conn, $update_url_facebook);
    }else {
      $insert_url_facebook = "INSERT INTO `url`(`SRC`, `ELECTIONPROGRAMID`, `SOCIALMEDIAID`) VALUES ( '$url_facebook', $program_id, 2)"; 
      $url_fac = mysqli_query($conn, $insert_url_facebook);
    }
  }
  // echo $_POST['instagram_id'];

  if(!empty($_POST['instagram'])) {
    $url_instagram = $_POST['instagram'];
    
    if(!empty($_POST['instagram_id'])){
      $update_url_instagram = "UPDATE url SET SRC = '$url_instagram' WHERE ID =". $instagram_id;
      $url_inst = mysqli_query($conn, $update_url_instagram);
    }else {
      $insert_url_instagram = "INSERT INTO `url`(`SRC`, `ELECTIONPROGRAMID`, `SOCIALMEDIAID`) VALUES ( '$url_instagram', $program_id, 1)"; 
      $url_inst = mysqli_query($conn, $insert_url_instagram);
    }
    
  }

  if(!empty($_POST['x'])) {
  $url_x = $_POST['x'];

  if(!empty($_POST['x_id'])){
  $update_url_x = "UPDATE url SET SRC = '$url_x' WHERE ID =". $x_id;
  $url_x = mysqli_query($conn, $update_url_x);
  }else {
    $insert_url_x = "INSERT INTO `url`(`SRC`, `ELECTIONPROGRAMID`, `SOCIALMEDIAID`) VALUES ( '$url_x', $program_id, 3)"; 
    $url_x = mysqli_query($conn, $insert_url_x);
  }

  }

  
  if(!empty($_POST['linkedin'])) {
  $url_linkedin = $_POST['linkedin'];

    if(!empty($_POST['linkedin_id'])){
      $update_url_linkedin = "UPDATE url SET SRC = '$url_linkedin' WHERE ID =". $linkedin_id;
      $url_linkedin = mysqli_query($conn, $update_url_linkedin);
    }else {
      $insert_url_linkedin = "INSERT INTO `url`(`SRC`, `ELECTIONPROGRAMID`, `SOCIALMEDIAID`) VALUES ( '$url_linkedin', $program_id, 4)"; 
      $url_linkedin = mysqli_query($conn, $insert_url_linkedin);
    }
  }


  if($old_password){
    if($old_password == $user['PASSWORD']){
      if($new_password == $confirm_password) {
        $password_query = "UPDATE user SET PASSWORD = '$new_password' WHERE ID = ".$user['ID'];  
        $pass = mysqli_query($conn, $password_query);
        $_SESSION['USER']['PASSWORD'] = $new_password;
      }
    }
  }
  // Redirect the user back to the page or show a success message
  header("Location: ../light/profile-settings.php");
  exit();
}
?>