<?php
    if (isset($_POST['save-info-Slide'])) {
        $imgId = $_POST['hide-id'];
        $title = $_POST['title-name-Slide'];
        $detail = $_POST['detail-title-Slide'];

        // Check if a new image is selected
        if ($_FILES['chooseImage-Slide']['size'] > 0) {
            // Remove existing image if any
            $querySelect = "SELECT img_pathSlid FROM tbl_img WHERE img_id = $imgId";
            $resultSelect = $conn->query($querySelect);
            if ($resultSelect->num_rows > 0) {
                $row = $resultSelect->fetch_assoc();
                $oldImagePath = $row['img_pathSlid'];
                unlink("./$oldImagePath"); // Delete the old image file
            }

            // Upload the new image
            $targetDir = "../asset/slideimg/";
            $imageName = uniqid() . "_" . basename($_FILES["chooseImage-Slide"]["name"]);
            $targetPath = $targetDir . $imageName;

            if (move_uploaded_file($_FILES["chooseImage-Slide"]["tmp_name"], $targetPath)) {
                // Image uploaded successfully, update the database
                $queryUpdate = "UPDATE tbl_img SET title_slide = '$title', detail_slide = '$detail', img_pathSlid = '$targetPath' WHERE img_id = $imgId";
                $resultUpdate = $conn->query($queryUpdate);

                if ($resultUpdate) {
                    echo "<script>
                        alert('ធ្វើបច្ចុប្បន្នភាពទិន្នន័យដោយជោគជ័យ');
                    </script>";
                } else {
                    echo "Error updating data: " . $conn->error;
                }
            } else {
                echo "Failed to upload image.";
            }
        } else {
            // No new image selected, only update text fields
            $queryUpdate = "UPDATE tbl_img SET title_slide = '$title', detail_slide = '$detail' WHERE img_id = $imgId";
            $resultUpdate = $conn->query($queryUpdate);

            if ($resultUpdate) {
                echo "<script>
                        alert('ធ្វើបច្ចុប្បន្នភាពទិន្នន័យដោយជោគជ័យ');
                        window.location.href='../layout/Home.php';
                    </script>";
            } else {
                echo "Error updating data: " . $conn->error;
            }
        }

        // Close the database connection
        $conn->close();
    }
?>
