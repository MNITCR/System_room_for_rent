$(document).ready(function () {

    // =========== Start get image from database ===========
    $(".card-").click(function () {
        // Get the data-id attribute value directly inside the click event
        var cardId = $(this).data("id");

        // AJAX request to fetch data
        $.ajax({
            url: '../components/php/vipRoom/showData.php',
            type: 'POST',
            data: { cardId: cardId },
            dataType: 'json',
            success: function (data) {
                // Populate modal inputs with fetched data
                console.log(data);
                $('#delete-card-btn-show-modal').attr("data-id", data.vip_data[0].vip_id);
                $('.vip_price_dollar').val(data.vip_data[0].vip_price_dollar);
                $('.vip_size_width').val(data.vip_data[0].vip_size_width);
                $('.vip_size_length').val(data.vip_data[0].vip_size_length);
                $('.vip_room_water').val(data.vip_data[0].vip_room_water);
                $('.vip_room_wc').val(data.vip_data[0].vip_room_wc);
                $('.vip_building').val(data.vip_data[0].vip_building);
                $('.vip_floor').val(data.vip_data[0].vip_floor);
                $('.vip_title').val(data.vip_data[0].vip_title);
                $('.vip_title_detail').val(data.vip_data[0].vip_title_detail);
                $('.image_from_showCardSub').attr('src', 'asset/content/' + data.vip_data[0].vip_pathImg);

                // Convert the dollar value to real Khmer using the exchange rate (1$ = 4100 real)
                var dollarValue = $("#vip_price_dollar_Show_Modal").val();
                dollarValue = dollarValue.replace(/[^\d.]/g, '');
                var realValue = dollarValue * 4100;

                // Format the real value with commas
                var formattedRealValue = realValue.toLocaleString();

                // Update the real input with the formatted value
                $("#vip_price_real_Show_Modal").val(formattedRealValue);



                $('.main-add-image-vip').empty();
                // Check if image_path is an array
                if (Array.isArray(data.image_path) && data.image_path.length > 0) {
                    // Loop through sub-images and append them to the modal
                    data.image_path.forEach(function (imagePath, index) {
                        if (data.img_title[index] !== null) {
                            $('.main-add-image-vip').append(`
                                <div class="mt-4 col-12 col-sm-5 col-md-5 col-lg-3 col-xl-3 col-xxl-2 position-relative">
                                    <div class="mb-2">
                                        <div class="d-none">
                                            <input type="file" id="add-sub-image-vip-${index}" accept="image/*">
                                        </div>
                                        <label class="card" for="add-sub-image-vip-${index}" id="add-image-vip-append-${index}" data-id="${index}">
                                            <div class="subContent-Img- card" style="height: 134px;overflow: hidden;">
                                                <img src="asset/subContent/${imagePath}" alt="Sub Image" class="choice_sub_img" style="height: 134px;">
                                            </div>

                                            <div class="d-none card-subContent-Img- card">
                                                <div class="card d-flex justify-content-center align-items-center p-5" style="height: 134px;cursor: pointer;">
                                                    <i class="ri-file-add-line fs-3 text-secondary"></i>
                                                    <span style="font-family: Kh Battambang;white-space: nowrap;">ជ្រើសរើសរូបភាព</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <input type="text" id="add-title-vip-${index}" class="form-control add-title-vip-" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="${data.img_title[index]}" disabled>
                                    </div>
                                    <div class="text-danger" style="position: absolute; top: 0;right: 5px;cursor: pointer;" id="close-card-vip-${index}">
                                        <i class="ri-close-circle-line"></i>
                                    </div>
                                </div>
                            `);
                        }
                    });
                }
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });

        // Trigger the modal to show
        $('#Modal-Popup-Show-Sub-Card-Vip').modal('show');
    });
    // =========== End get image from database ===========


    // =========== Start Function exchange money ===========
    $('#vip_price_dollar_Show_Modal').on('input', function(){
        // Convert the dollar value to real Khmer using the exchange rate (1$ = 4100 real)
        var dollarValue = $(this).val();
        dollarValue = dollarValue.replace(/[^\d.]/g, '');
        var realValue = dollarValue * 4100;

        // Format the real value with commas
        var formattedRealValue = realValue.toLocaleString();

        // Update the real input with the formatted value
        $("#vip_price_real_Show_Modal").val(formattedRealValue);
    });
    // =========== End Function exchange money ============


    // =========== Start Function Edit ===========
    $('#edit-card-vip-btn-show-modal').on('click', function(){
        var buttonText = $(this).text();

        if (buttonText === 'កែប្រែ') {
            // Switch to Save mode
            $(this).text('រក្សារទុក');

            $('.vip_price_dollar').prop('disabled', false);
            $('.vip_size_width').prop('disabled', false);
            $('.vip_size_length').prop('disabled', false);
            $('.vip_room_water').prop('disabled', false);
            $('.vip_room_wc').prop('disabled', false);
            $('.vip_building').prop('disabled', false);
            $('.vip_floor').prop('disabled', false);
            $('.vip_title').prop('disabled', false);
            $('.vip_title_detail').prop('disabled', false);

            // sub card
            $('.add-title-vip-').prop('disabled', false);
            $('.card-subContent-Img-').addClass('d-flex');
            $('.card-subContent-Img-').removeClass('d-none');
            $('.subContent-Img-').addClass('d-none');

            // main card
            $('.main-content-img-').addClass('d-none');
            $('.main-content-card-').addClass('d-flex');
            $('.main-content-card-').removeClass('d-none');

            // btn add more sub card
            $('#add-more-card-show-modal').prop('disabled', false);
        } else {
            // Switch to Edit mode
            $(this).text('រក្សារទុក');

            // Disable input fields or perform save actions
            $('.vip_price_dollar').prop('disabled', true);
            $('.vip_size_width').prop('disabled', true);
            // Disable other fields as needed

            // Perform save actions, e.g., update the database
            saveDataToDatabase();
        }
    });

    function saveDataToDatabase() {
        // Implement the logic to save data to the database here
        // You can use AJAX to send the updated data to the server
        // Example AJAX request:
        // $.ajax({
        //     url: 'your_backend_script.php',
        //     type: 'POST',
        //     data: { /* your data here */ },
        //     success: function(response) {
        //         console.log('Data saved successfully');
        //     },
        //     error: function(error) {
        //         console.error('Error saving data:', error);
        //     }
        // });
    }

    // =========== Start Function Edit ===========
});
