<?php
    include '../connection.php';

    $query = "SELECT img_id,img_pathSlid, title_slide, detail_slide FROM tbl_img";
    $result = $conn->query($query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    // Return data as JSON
    echo json_encode($data);
?>
