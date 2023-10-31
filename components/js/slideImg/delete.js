$(document).on('click', '#delete-info-Slide', function () {
    // Assuming you have img_id stored in a variable
    var imgId = $('#hide-id').val();
    console.log(imgId);

    // Confirm the deletion
    if (confirm("តើអ្នកចង់លុបទិន្ន័យនេះមែនទេ?")) {
        // Send AJAX request to delete the slide
        $.ajax({
            type: "POST",
            url: "../components/php/slideImg/delete.php", // Replace with the actual path to your PHP file for deletion
            data: { img_id: imgId },
            success: function (response) {
                if(confirm('បានលុបស្លាយដោយជោគជ័យ។')){
                    window.location.href='../layout/Home.php';
                }
                console.log(response);
            },
            error: function (error) {
                console.error("Error deleting slide:", error);
            }
        });
    }
});
