<?php
   session_start();
   if(isset($_SESSION["USER"])){
       if($_GET['p200']) {
           header('location: ../light/page-200.html');
           session_destroy();
       } else {
            header('location: ../voter/index-02.php');
            session_destroy();
       }  
   }
   else{
       header('location:  ../light/index.php');
   }
?>