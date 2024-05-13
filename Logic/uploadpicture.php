<?php

include ('../Logic/Connection.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $targetDirectory = "../uploads/"; // Directory to store uploaded images
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $program_id = $_POST['program_id'];

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = false;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = false;
    }

    // Check file size (you can adjust the size limit as needed)
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = false;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = false;
    }

    // Check if $uploadOk is set to false by an error
    if ($uploadOk === false) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            // Here you can perform database operations to insert/update the image
            $imagePath = $targetFile;
            $sql = "UPDATE electionprogram SET PROFILE = '$imagePath' WHERE id =". $program_id;
            $result = mysqli_query($conn, $sql);

            header("Location: ../light/profile-settings.php");
            exit();
             
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "No file was uploaded.";
}
?>
