<?php
    if (isset($_POST['save-info-new'])) {
        // Get user ID from the session
        $userId = $_SESSION['user_id'];

        // Get new values from the form
        $newUsername = $_POST['admin-name-new'];
        $newPassword = $_POST['admin-password-new'];

        // Handle image upload
        if (!empty($_FILES['chooseImage-new']['name'])) {
            // Generate a unique image filename
            $newImageName = uniqid() . "_" . basename($_FILES["chooseImage-new"]["name"]);
            $targetPath = "../asset/uploads/" . $newImageName;

            // Move the uploaded image to the desired directory
            if (move_uploaded_file($_FILES["chooseImage-new"]["tmp_name"], $targetPath)) {
                // Update image path in the database
                $updateImageQuery = "UPDATE tbl_user SET img_path = '$targetPath' WHERE user_id = $userId";
                mysqli_query($conn, $updateImageQuery);
            } else {
                echo '<script>
                        alert("បរាជ័យក្នុងការបង្ហោះរូបភាព។");
                        window.location.href = "layout/Home.php";
                    </script>';
            }
        }

        // Update username and password in the database
        $updateInfoQuery = "UPDATE tbl_user SET adm_name = '$newUsername', adm_password = '$newPassword' WHERE user_id = $userId";
        if (mysqli_query($conn, $updateInfoQuery)) {
            echo '<script>
                    alert("ព័ត៌មានត្រូវបានធ្វើបច្ចុប្បន្នភាពដោយជោគជ័យ!");
                    window.location.href = "../layout/Home.php";
                </script>';
        } else {
            echo "Error updating information: " . mysqli_error($conn);
        }
    }
?>
