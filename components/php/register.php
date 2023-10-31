<?php

if (isset($_POST['save-info-db'])){
    $admName = $_POST['admin-name'];
    $admPass = $_POST['admin-password'];
    $randomCode = uniqid();

    // Generate a unique image filename
    $imageName = uniqid() . "_" . basename($_FILES["chooseImage"]["name"]);
    $targetPath = "../asset/uploads/" . $imageName;

    // Move the uploaded image to the desired directory
    if (move_uploaded_file($_FILES["chooseImage"]["tmp_name"], $targetPath)) {
        // Prepare and execute the SQL query
        $stmt = $conn->prepare("INSERT INTO tbl_user (adm_name, adm_password, img_path, uniqcode, created_at) VALUES (?, ?, ?, ?, now())");

        if ($stmt) {
            $stmt->bind_param("ssss", $admName, $admPass, $targetPath, $randomCode);

            if ($stmt->execute()) {
                // Show success toast
                echo '<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>';
                echo '<script>
                    $(document).ready(function(){
                        $(".toast").toast("show");
                    });
                </script>';
            } else {
                echo "Error executing query: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing query: " . $conn->error;
        }

        // Close the connection
        $conn->close();
    } else {
        echo "Failed to upload image.";
    }
}
?>
