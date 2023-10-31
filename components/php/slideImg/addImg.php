<?php
    if (isset($_POST['Add-info-Slide'])) {
        // Get form data
        $title = $_POST['title-name-Slide-New'];
        $detail = $_POST['detail-title-Slide-New'];

        // Check if an image is uploaded
        if (empty($_FILES["chooseImage-Slide-New"]["name"])) {
            echo '<script>alert("រូបភាពមិនអាចទទេបានទេ។");</script>';
        }
        else{
            // Handle image upload
            $targetDir = "../asset/slideimg/"; // Specify your upload directory
            $targetFile = $targetDir . basename($_FILES["chooseImage-Slide-New"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["chooseImage-Slide-New"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                echo "<script>
                        alert('ឯកសារមិនមែនជារូបភាពទេ។');
                    </script>
                ";
            }

            // Check if file already exists
            if (file_exists($targetFile)) {
                $uploadOk = 0;
                echo "<script>
                        alert('សូមអភ័យទោស ឯកសារមានរួចហើយ។');
                    </script>
                ";
            }

            // Check file size
            if ($_FILES["chooseImage-Slide-New"]["size"] > 500000) {
                $uploadOk = 0;
                echo "<script>
                        alert('សូមអភ័យទោស ឯកសាររបស់អ្នកធំពេក។');
                    </script>
                ";
            }

            // Allow certain file formats
            if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
            ) {
            $uploadOk = 0;
            echo "<script>
                        alert('សូមអភ័យទោស មានតែឯកសារ JPG, JPEG, PNG និង GIF ប៉ុណ្ណោះដែលត្រូវបានអនុញ្ញាត។');
                    </script>
                ";
            }

            // Check if $uploadOk is set to 0 by an error
            if (!$uploadOk == 0) {
                if (move_uploaded_file($_FILES["chooseImage-Slide-New"]["tmp_name"], $targetFile)) {
                    // File uploaded successfully, insert data into the database
                    $insertQuery = "INSERT INTO tbl_img (title_slide, detail_slide, img_pathSlid, created_at) VALUES ('$title', '$detail', '$targetFile', now())";
                    // Execute the query
                    mysqli_query($conn, $insertQuery);
                    echo "<script>
                            alert('បានបន្ថែមព័ត៌មានដោយជោគជ័យ។');
                        </script>
                    ";
                } else {
                    echo "<script>
                            alert('សូមអភ័យទោស មានកំហុសក្នុងការបង្ហោះឯកសាររបស់អ្នក។');
                        </script>
                    ";
                }
            }
        }
    }
?>
