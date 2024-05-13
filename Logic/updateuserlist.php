<?php  
include('../Logic/Connection.php');

$list_id = $_POST['list_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any user is selected
    if (isset($_POST['selected_users']) && is_array($_POST['selected_users'])) {
        foreach ($_POST['selected_users'] as $user_id) {
            // Update the LISTID for selected users
            $update_query = "UPDATE user SET LISTID = '$list_id' WHERE ID = '$user_id'";
            mysqli_query($conn, $update_query);
        }
    }

    header("Location: ../light/list.php");
    exit();
}

// echo $_POST['selected_users'];
// echo "<pre>";
// print_r($_POST['selected_users']);
// echo "</pre>";
?>