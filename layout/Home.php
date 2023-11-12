<?php
    include '../components/php/connection.php';

    // Navbar
    include '../components/php/register.php';
    include '../components/php/getinfo.php';
    include '../components/php/update.php';

    // Slide
    include '../components/php/slideImg/addImg.php';
    include '../components/php/slideImg/update.php';

    // VipRoom
    // include '../components/php/vipRoom/deleteCard.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../components/php/links.php';?>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../components/css/navbar.css?<?php echo time();?>">
</head>
<body>

    <!-- =============== Start Components Navbar ================== -->
    <?php include '../components/html/navbar.php' ?>
    <!-- =============== End Components Navbar ================== -->


    <!-- ================= Start slide Image ================= -->
    <?php include '../components/html/slide.php'; ?>
    <!-- ================= End slide Image =================  -->


    <!-- ================= Start slide Image ================= -->
    <?php include '../components/html/vipRoom.php'; ?>
    <!-- ================= End slide Image =================  -->


    <!-- ================= Start slide Image ================= -->
    <?php include '../components/html/simpleRoom.php'; ?>
    <!-- ================= End slide Image =================  -->


    <!-- ================= Start slide Image ================= -->
    <?php include '../components/html/footer.php'; ?>
    <!-- ================= End slide Image =================  -->


    <!-- Navbar -->
    <script src="../components/js/navbar.js?<?php echo time();?>"></script>

    <!-- Slide -->
    <script src="../components/js/slideImg/slideImg.js?<?php echo time();?>"></script>
    <script src="../components/js/slideImg/getImg.js?<?php echo time();?>"></script>
    <script src="../components/js/slideImg/updateImg.js?<?php echo time();?>"></script>
    <script src="../components/js/slideImg/delete.js?<?php echo time();?>"></script>

    <!-- VIP ROOM -->
    <script src="../components/js/vipRoom/addCard.js?<?php echo time();?>"></script>
    <script src="../components/js/vipRoom/showCardSub.js?<?php echo time();?>"></script>
    <script src="../components/js/vipRoom/deleteCard.js?<?php echo time();?>"></script>



    <!-- SIMPLE ROOM -->
    <script src="../components/js/simpleRoom/addCard.js?<?php echo time();?>"></script>
</body>
</html>
