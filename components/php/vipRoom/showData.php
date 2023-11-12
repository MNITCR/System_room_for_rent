<?php
    include '../connection.php';

    // Check if the ID is provided in the URL or some other way
    if (isset($_POST['cardId'])) {
        $vip_content_id = $_POST['cardId'];

        // Fetch data from vip_content and vip_img tables
        $sql = "SELECT vip_content.*, vip_img.image_path, vip_img.img_title
        FROM vip_content
        LEFT JOIN vip_img ON vip_content.vip_id = vip_img.vip_content_id
        WHERE vip_content.vip_id = $vip_content_id";

        $result = $conn->query($sql);

        if ($result) {
            // Fetch all rows at once
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Separate image_path and img_title arrays
            $images = array_column($data, 'image_path');
            $titles = array_column($data, 'img_title');

            echo json_encode(['vip_data' => $data, 'image_path' => $images, 'img_title' => $titles]);
        } else {
            echo json_encode(['error' => 'Database error']);
        }

        $conn->close();
    } else {
        echo json_encode(['error' => 'Invalid request']);
    }
?>
