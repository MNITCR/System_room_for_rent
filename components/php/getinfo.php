<?php
    // Assume you have a session started
    session_start();

    if (isset($_SESSION['user_id'])) {
        // Get the user ID from the session
        $userId = $_SESSION['user_id'];

        // Query to fetch user data based on the user ID
        $query = "SELECT adm_name, adm_password, img_path FROM tbl_user WHERE user_id = $userId";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            // Retrieve data from the row
            $username = $row['adm_name'];
            $password = $row['adm_password'];
            $imagePath = $row['img_path'];
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    }
?>
