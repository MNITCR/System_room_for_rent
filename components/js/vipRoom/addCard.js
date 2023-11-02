$(document).ready(function() {
    $('[data-bs-toggle="tooltip"]').tooltip();
    $('#add-card-vip').on('click', function(){
        $('#Modal-Popup-Add-Info-Card-Vip').modal('show');
    });



    // ============ Start one more cards ============
    $(document).on('change', '#chooseImage-Slide-Card-Vip', function () {
        var input = this;
        var image = $(`#showImageChoose-Slide-Card-Vip`);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showImageChoose-Slide-Card-Vip').html('<img src="' + e.target.result + '" id="image-id-user-select-vip-one" alt="Selected Image" style="width: 100%; height: 305px;border-radius: 3px;">');
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    $(document).on('click', '#showImageChoose-Slide-Card-Vip', function () {
        $(`#chooseImage-Slide-Card-Vip`).click();  // Fixed typo in the ID
    });
    // ============ End one more cards ============



    // ============ Start adding more cards ============
    var cardCount = 1;
    $(document).ready(function () {

        $("#add-more-card-vip-btn").click(function () {
            // Create a new card
            var newCard = $(
                '<div class="mt-4 col-12 col-sm-5 col-md-5 col-lg-3 col-xl-3 col-xxl-2 position-relative">' +
                    '<div class="mb-2">' +
                        '<div class="d-none">' +
                            '<input type="file" id="add-sub-image-vip-' + cardCount + '" accept="image/*">' +
                        '</div>' +
                        '<label class="card" for="add-sub-image-vip-' + cardCount + '" id="add-image-vip-append-' + cardCount + '" data-id=' + cardCount + '>'+
                            '<div class="card d-flex justify-content-center align-items-center p-5" style="height: 134px;cursor: pointer;">' +
                                '<i class="ri-file-add-line fs-3 text-secondary"></i>' +
                                '<span style="font-family: Kh Battambang;white-space: nowrap;">ជ្រើសរើសរូបភាព</span>' +
                            '</div>' +
                        '</label>'+
                    '</div>' +
                    '<div class="input-group input-group-sm">' +
                        '<input type="text" id="add-title-vip-' + cardCount + '" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">' +
                    '</div>' +
                    ' <div class="text-danger" style="position: absolute; top: 0;right: 5px;cursor: pointer;" id="close-card-vip-' + cardCount + '">' +
                        '<i class="ri-close-circle-line"></i>' +
                    '</div>' +
                '</div>'
            );

            // Append the new card
            $("#main-add-image-vip").append(newCard);

            // Show image on file input change
            $("#add-sub-image-vip-" + cardCount).change(function () {
                var input = $(this);

                // Get selected file
                var selectedFile = this.files[0];

                // Get the data-id from the corresponding label
                var dataId = input.closest('.position-relative').find('[data-id]').data('id');

                // Update the card content with the selected image
                if (selectedFile) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        console.log(dataId + e.target.result);
                        $('#add-image-vip-append-' + dataId).html('<img src="' + e.target.result + '" id="image-id-user-select-vip-' + dataId + '" alt="Selected Image" style="width: 100%; height: 134px;border-radius: 3px;" multiple>');
                    };

                    // Read the selected file as Data URL
                    reader.readAsDataURL(selectedFile);
                }
            });


            // Close cards
            $("#close-card-vip-" + cardCount).click(function () {
                newCard.remove();
            });

            cardCount++;

        });
    });
    // ============ End adding more cards ============



    // ============ Start insert data to database ============

    $(document).ready(function () {
        $("#vipForm").submit(function (e) {
            e.preventDefault();

            // Get form data
            var formData = new FormData(this);

            // Add data from the card dynamically created
            $(".card").each(function () {
                var cardId = $(this).attr("data-id");
                var title = $("#add-title-vip-" + cardId).val();

                // Only append the title if it is defined
                if (title !== undefined && title !== null) {
                    formData.append("card_titles[]", title);
                }

                // Check if file input exists
                var fileInput = $("#add-sub-image-vip-" + cardId);
                if (fileInput.length > 0 && fileInput[0].files.length > 0) {
                    // Add image files
                    var imageFile = fileInput[0].files[0];
                    formData.append("card_images[]", imageFile);
                }
                console.log(imageFile);
            });

            // Add individual form fields
            formData.append("vip_title", $("#vip_title").val());
            formData.append("vip_title_detail", $("#vip_title_detail").val());
            formData.append("vip_price_dollar", $("#vip_price_dollar").val());
            formData.append("vip_size_width", $("#vip_size_width").val());
            formData.append("vip_size_length", $("#vip_size_length").val());
            formData.append("vip_room_water", $("#vip_room_water").val());
            formData.append("vip_room_wc", $("#vip_room_wc").val());
            formData.append("vip_building", $("#vip_building").val());
            formData.append("vip_floor", $("#vip_floor").val());


            // Send form data to PHP script using AJAX
            $.ajax({
                url: "../components/php/vipRoom/insert_data.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.trim() === "success") {
                        window.location.href="../layout/Home.php";
                    }else {
                        console.log("Unexpected response:", response);
                    }
                    console.log(response);
                },
                error: function (error) {
                    // Handle errors
                    console.log(error);
                }
            });
        });
    });

    // ============ End insert data to database ============

});
