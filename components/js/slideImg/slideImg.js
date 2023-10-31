$(document).ready(function(){
    // ================= Start Update Slide =================
    $(document).on('click', '[id^="Edit_Slide"]', function () {
        var imgId = $(this).attr('id').replace('Edit_Slide', '');
        // Now, imgId contains the numeric part of the ID
        $('#Modal-Popup-Update-Info-Slide').modal('show');
    });

    // Choose image button click
    $(document).on('click', '#SelectImage-Slide', function () {
        var imgId = $(this).attr('id').replace('SelectImage-Slide', '');
        // Now, imgId contains the numeric part of the ID
        $(`#chooseImage-Slide`).click();
    });

    // Start choose image
    $(document).on('change', '#chooseImage-Slide', function () {
        var imgId = $(this).attr('id').replace('chooseImage-Slide', '');
        // Now, imgId contains the numeric part of the ID

        var input = this;
        var image = $(`#showImageChoose-Slide${imgId}`);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                image.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });
    // ================= End Update Slide =================



    // ================= Start Add New Slide =================
    $(document).on('click', '[id^="Add_NewSlide"]', function () {
        // Your logic for adding new slide with imgId
        $('#Modal-Popup-Add-Info-Slide').modal('show');
    });

    // Start choose image
    $(document).on('change', '#chooseImage-Slide-New', function () {
        var input = this;
        var image = $(`#showImageChoose-Slide-New`);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                image.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    $(document).on('click', '#SelectImage-Slide-New', function () {
        var imgId = $(this).attr('id').replace('SelectImage-Slide-New', '');
        $(`#chooseImage-Slide-New${imgId}`).click();  // Fixed typo in the ID
    });
    // End choose image
    // ================= End Add New Slide =================

});
