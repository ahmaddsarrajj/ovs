<?php if($user['VOTED'] == 0) {
        // insert to box if there is not an user
        if (empty($box)) {
            $insert_box_query = "INSERT INTO `box`(`VOTENUMBER`, `USERID`, `DATE`) VALUES ('1','".$vote."','2024-05-20')";
            $insert_box = mysqli_query($conn,$insert_box_query);
            
            if($insert_box) {
                $update_user_status_query = "UPDATE `user` SET `VOTED`= 1 WHERE ID = ".$user['ID'];
                $update_vote = mysqli_query($conn, $update_user_status_query);
                $user['VOTED'] = 1;
            }
            
        }else {
            $update_box_query = "UPDATE `box` SET `VOTENUMBER`= ".($box['VOTENUMBER']+ 1) ." WHERE USERID = ".$vote;
            $update_box = mysqli_query($conn, $update_box_query);
            
            if($update_box) {
                $update_user_status_query = "UPDATE `user` SET `VOTED`= 1 WHERE ID = ".$user['ID'];
                $update_vote = mysqli_query($conn, $update_user_status_query);
                $user['VOTED'] = 1;
            }
    }
}else{
    header('Location:../light/page-403.html'); 
}

?>