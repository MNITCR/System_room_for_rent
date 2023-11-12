$(document).ready(function () {
    $("#delete-card-btn-show-modal").click(function () {
        if(confirm("តើអ្នកប្រាកដថាចង់លុប?")){
            var cardId = $(this).data("id");

            // AJAX request to delete card and associated images
            $.ajax({
                url: '../components/php/vipRoom/deleteCard.php',
                type: 'POST',
                data: { cardId: cardId },
                success: function (response) {
                    console.log(response);

                    // Check the response and take appropriate actions
                    if (response === "success") {
                        alert("លុបបានជោគជ័យ");
                        window.location.href = "../layout/Home.php";
                    } else {
                        // Handle the error, show a message, etc.
                        alert("Error deleting card and images");
                    }
                },
                error: function (error) {
                    console.log(error.responseText);
                }
            });
        }
    });
});
