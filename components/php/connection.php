<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "system_room_for_rent";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn){
        printf("Connection established");
    }
?>
