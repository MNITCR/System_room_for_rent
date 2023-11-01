$(document).ready(function() {
    $('[data-bs-toggle="tooltip"]').tooltip();
    $('#add-card-vip').on('click', function(){
        $('#Modal-Popup-Add-Info-Card-Vip').modal('show');
    });


    // ============ Start adding more cards ============
    $(document).ready(function () {
        var cardCount = 1;

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
                        $('#add-image-vip-append-' + dataId).html('<img src="' + e.target.result + '" id="image-id-user-select-vip-' + dataId + '" alt="Selected Image" style="width: 100%; height: 134px;">');
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




});
