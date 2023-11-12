<?php
include '../connection.php';

if (isset($_POST['cardId'])) {
    $vip_content_id = $_POST['cardId'];

    // Fetch image paths from vip_img table
    $sql = "SELECT vip_content.vip_pathImg, vip_img.image_path
            FROM vip_content
            LEFT JOIN vip_img ON vip_content.vip_id = vip_img.vip_content_id
            WHERE vip_content.vip_id = $vip_content_id";

    $result = $conn->query($sql);


    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = $row['vip_pathImg'];
            $absoluteImagePath = realpath($imagePath);
            if ($absoluteImagePath) {
                unlink($absoluteImagePath);
            }

            $imagePathSub = $row['image_path'];
            $absoluteImagePathSub = realpath($imagePathSub);
            if ($absoluteImagePathSub) {
                unlink($absoluteImagePathSub);
            }
        }
        
        // Now, delete entries from vip_img and vip_content tables
        $deleteImgSql = "DELETE FROM vip_img WHERE vip_content_id = $vip_content_id";
        $deleteContentSql = "DELETE FROM vip_content WHERE vip_id = $vip_content_id";

        $resultImg = $conn->query($deleteImgSql);
        $resultContent = $conn->query($deleteContentSql);

        if ($resultImg && $resultContent) {
            echo "success";
        } else {
            echo "Error deleting card and images: " . $conn->error;
        }
    } else {
        echo "Error fetching image paths: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>
