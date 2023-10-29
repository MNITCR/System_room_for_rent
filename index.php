<?php
    include 'components/php/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/php/links.php' ?>
    <title>Dashboard</title>
</head>
<body>
    <div class="bg-info d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
        <form class="col-11 col-xs-12 col-md-5" method="POST">
            <!-- start admin name -->
            <div class="mb-3 text-center">
                <h2 style="font-family: Kh KoulenL;">តារាងចុះឈ្មោះ</h2>
            </div>
            <!-- end admin name -->


            <!-- start admin name -->
            <div class="mb-3">
                <label for="admin-name" class="col-form-label" style="font-family: Kh Battambang;">ឈ្មោះអ្នកប្រើប្រាស់:</label>
                <input type="text" class="form-control" id="admin-name" name="admin-name">
            </div>
            <!-- end admin name -->

            <!-- start admin password -->
            <div class="">
                <label for="recipient-name" class="col-form-label" style="font-family: Kh Battambang;">លេខសម្ងាត់:</label>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="admin-password" name="admin-password">
                <button type="button" class="input-group-text" for="admin-password" id="hide-show-password"><i class="fa-solid fa-eye"></i></button>
            </div>
            <!-- end admin password -->

            <!-- Start confirm password -->
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label" style="font-family: Kh Battambang;">បញ្ជាក់លេខសម្ងាត់:</label>
                <input type="text" class="form-control" id="admin-password-confirm" name="admin-password-confirm">
            </div>
            <!-- End confirm password -->

            <!-- Start submit button -->
            <button type="submit" class="btn btn-primary" style="font-family: Kh Battambang;" name="save-info" id="save-info" disabled>ចូលប្រព័ន្ធ</button>
            <!-- End submit button -->
        </form>
    </div>

    <script>
        // Start show and hide password
        $('#hide-show-password').on('click', () => {
            var passwordInput = $('#admin-password');
            var toggleButton = $('#hide-show-password');

            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                toggleButton.html('<i class="fa-solid fa-eye-slash"></i>'); // Change to hide icon
            } else {
                passwordInput.attr('type', 'password');
                toggleButton.html('<i class="fa-solid fa-eye"></i>'); // Change to show icon
            }
        });
        // End show and hide password

        // Function to check if all input fields are filled and passwords match
        function checkInputs() {
            var adminName = $('#admin-name').val();
            var adminPassword = $('#admin-password').val();
            var adminPasswordConfirm = $('#admin-password-confirm').val();

            // Check if all fields are filled and passwords match
            var isValid = adminName !== '' && adminPassword !== '' && adminPassword === adminPasswordConfirm;

            // Enable/disable the submit button based on validation result
            $('#save-info').prop('disabled', !isValid);
        }

        // Event handler for input changes
        $('input').on('input', checkInputs);
    </script>
</body>
</html>
