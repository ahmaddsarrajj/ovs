<?php 
    include("../Logic/Connection.php");

    $get_candidates_sql = "SELECT 
    user.ID as id, user.REGISTERID as register_id, user.LISTID as list_id, user.ROLEID as role_id, register.ID AS register_id, smallarea.ID as small_area_id
    FROM user
    JOIN register ON user.REGISTERID = register.ID
    JOIN record ON register.RECORDID = record.ID
    JOIN smallarea ON record.SMALLAREAID = smallarea.ID
    WHERE user.ROLEID = 1 and user.LISTID is not NULL";

    $get_candidates = mysqli_query($conn,$get_candidates_sql);
    $candidates = [];
    while ($row = mysqli_fetch_assoc($get_candidates)) {
        $candidates[] = $row;
    }
    $candidates_json = json_encode($candidates);

    $get_small_area_sql = "SELECT `ID` as small_area_id, `BIGAREAID` as big_area_id, `PRIORITY` as priority, `SEATS_NUMBER` as seats_num FROM `smallarea`";
    $get_small_area = mysqli_query($conn,$get_small_area_sql);
    $small_area = [];
    while ($row = mysqli_fetch_assoc($get_small_area)) {
        $small_area[] = $row;
    }
    $small_area_json = json_encode($small_area);

    $get_box_sql = "SELECT ID as id, USERID AS user_id , VOTENUMBER as vote_number_result FROM `box`";
    $get_box = mysqli_query($conn,$get_box_sql);
    $box = [];
    while ($row = mysqli_fetch_assoc($get_box)) {
        $box[] = $row;
    }
    $box_json = json_encode($box);

echo $candidates_json;
    $test = json_encode('[{id:1}, {id:2}]');
    // Construct the command to execute the Python script with arguments
    //  $command = escapeshellcmd("py ./result.py $test");

    //  // Execute the command and capture the output
    //  $output = shell_exec($command);

    //  // Display the output
    //  echo $output;

?>