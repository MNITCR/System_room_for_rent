<?php
session_start();

if (isset($_POST['login'])) {
    $admName = $_POST['admin-name'];
    $admPass = $_POST['admin-password'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT user_id, adm_name, adm_password FROM tbl_user WHERE adm_name=? AND adm_password=?";
    $stmt = $conn->prepare($query);

    // Check if prepare was successful
    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param("ss", $admName, $admPass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        // Store the user_id in the session
        $_SESSION['user_id'] = $user_id;

        // Redirect to Home.php
        echo '<script>
            window.location.href = "layout/Home.php";
        </script>';
    } else {
        echo "Invalid login credentials";
    }

    $stmt->close();
    $conn->close();
}
?>
