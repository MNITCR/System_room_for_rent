$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "../components/php/slideImg/getImg.php", // Replace with the actual path to your PHP file
        dataType: "json",
        success: function (slidesData) {
            // Now you have access to slidesData in this block
            $(document).on('click', '[id^="Edit_Slide"]', function () {
                var imgId = $(this).attr('id').replace('Edit_Slide', '');

                // Find the corresponding item in your data array based on imgId
                var currentItem = slidesData.find(item => item.img_id == imgId);

                // Set the values in the modal based on the currentItem
                $('#showImageChoose-Slide').attr('src', currentItem.img_pathSlid);
                $('#title-name-Slide').val(currentItem.title_slide);
                $('#detail-title-Slide').val(currentItem.detail_slide);
                $('#hide-id').val(currentItem.img_id);

                $('#Modal-Popup-Update-Info-Slide').modal('show');
            });
        },
        error: function (error) {
            console.error("Error fetching data:", error);
        }
    });

});
