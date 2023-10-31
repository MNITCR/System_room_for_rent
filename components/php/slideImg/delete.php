<?php
    include '../connection.php';

    if (isset($_POST['img_id'])) {
        $imgId = $_POST['img_id'];

        // Retrieve the image path from the database
        $selectQuery = "SELECT img_pathSlid FROM tbl_img WHERE img_id = ?";
        $stmtSelect = $conn->prepare($selectQuery);
        $stmtSelect->bind_param("i", $imgId);
        $stmtSelect->execute();
        $stmtSelect->bind_result($imgPath);
        $stmtSelect->fetch();
        $stmtSelect->close();

        // Delete the image file from the upload folder
        if (unlink("../../$imgPath")) {
            // Remove the record from the database
            $deleteQuery = "DELETE FROM tbl_img WHERE img_id = ?";
            $stmtDelete = $conn->prepare($deleteQuery);
            $stmtDelete->bind_param("i", $imgId);

            if ($stmtDelete->execute()) {
                echo "បានលុបរូបភាពដោយជោគជ័យ។";
            } else {
                echo "Error deleting slide from the database: " . $stmtDelete->error;
            }

            $stmtDelete->close();
        } else {
            echo "Error deleting image file from the upload folder.";
        }
    }

    $conn->close();
?>
