$(document).ready(function() {
    // Fetch data from the server using AJAX
    $.ajax({
        url: '../components/php/slideImg/getImg.php', // Replace with the actual path to your PHP script
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Iterate over the data and append carousel items
            $.each(data, function(index, item) {
                var activeClass = index === 0 ? 'active' : ''; // Add 'active' class to the first item

                // Append carousel item
                $('.carousel-inner').append(`
                    <div class="carousel-item ${activeClass}">
                        <img src="${item.img_pathSlid}" class="d-block w-100 rounded-bottom" alt="Slide" style="height: 500px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="font-family: Kh Battambang;">${item.title_slide}</h5>
                            <p style="font-family: Kh Battambang;">${item.detail_slide}</p>
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <button type="button" class="btn btn-danger" style="font-family: Kh Battambang;" id="Edit_Slide${item.img_id}">កែប្រែ</button>
                                <button type="button" class="btn btn-primary" style="font-family: Kh Battambang;" id="Add_NewSlide${item.img_id}">បន្ថែម</button>
                            </div>
                        </div>
                    </div>
                `);
            });
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
});
