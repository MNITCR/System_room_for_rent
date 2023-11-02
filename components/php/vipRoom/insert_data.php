<?php
    include '../connection.php';

    if (isset($_POST['vip_title'])) {
        $vipTitle = $_POST['vip_title'];
        $vipTitleDetail = $_POST['vip_title_detail'];
        $vipPriceDollar = $_POST['vip_price_dollar'];
        $vipSizeWidth = $_POST['vip_size_width'];
        $vipSizeLength = $_POST['vip_size_length'];
        $vipRoomWater = $_POST['vip_room_water'];
        $vipRoomWC = $_POST['vip_room_wc'];
        $vipBuilding = $_POST['vip_building'];
        $vipFloor = $_POST['vip_floor'];

        // Process main content image
        if (isset($_FILES['chooseImage-Slide-Card-Vip']) && $_FILES['chooseImage-Slide-Card-Vip']['tmp_name']) {
            $file_name = $_FILES['chooseImage-Slide-Card-Vip']['name'];
            $file_tmp = $_FILES['chooseImage-Slide-Card-Vip']['tmp_name'];

            $upload_dir = '../../../asset/content/';
            $content_file = $upload_dir . $file_name;

            move_uploaded_file($file_tmp, $content_file);

            // Insert main content data into vip_content table
            $sql = "INSERT INTO vip_content (vip_title, vip_title_detail, vip_price_dollar, vip_size_width, vip_size_length, vip_room_water, vip_room_wc, vip_building, vip_floor, vip_pathImg) VALUES ('$vipTitle', '$vipTitleDetail', '$vipPriceDollar', '$vipSizeWidth', '$vipSizeLength', '$vipRoomWater', '$vipRoomWC', '$vipBuilding', '$vipFloor', '$content_file')";
            $result = $conn->query($sql);

            if ($result) {
                $vipContentId = $conn->insert_id;
                $cardTitles = $_POST['card_titles'];


                // Process sub-content images and insert into vip_img table
                if (isset($_FILES['card_images']['tmp_name'])) {
                    $uploadPath = "../../../asset/subContent/";

                    foreach ($_FILES['card_images']['tmp_name'] as $key => $tmp_name) {
                        $uploadFile = $uploadPath . basename($_FILES['card_images']['name'][$key]);
                        $img_title = isset($cardTitles[$key]) ? $cardTitles[$key] : '';

                        if (move_uploaded_file($_FILES['card_images']['tmp_name'][$key], $uploadFile)) {
                            // Insert image data into vip_img table
                            $img_sql = "INSERT INTO vip_img (img_title,vip_content_id, image_path) VALUES ('$img_title',$vipContentId, '$uploadFile')";
                            $result_img = $conn->query($img_sql);

                            if (!$result_img) {
                                echo "Error inserting sub-content image: " . $conn->error;
                            }
                        } else {
                            echo "Error moving sub-content image file.";
                        }
                    }
                }
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Main content image not provided.";
        }
    } else {
        echo "No form data received.";
    }

    // Close the database connection
    $conn->close();
?>
