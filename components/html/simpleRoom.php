<div class="container">
    <div class="mt-5">
        <div class="d-flex justify-content-center gap-2 mb-4">
            <div class="">
                <h3 style="font-family: Kh KoulenL;">បន្ទប់ ធម្មតា</h3>
            </div>
            <div class="" id="add-card-simple" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="បន្ថែម">
                <i class="ri-file-add-line btn btn-sm btn-outline-success"></i>
            </div>
        </div>
        <div class="main-card-vip-room d-flex gap-3 justify-content-center align-items-center flex-wrap">
            <div class="card" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../asset/image/slide1.jpg" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="card" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="../asset/image/slide1.jpg" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../asset/image/slide1.jpg" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="../asset/image/slide1.jpg" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- ============== Start Modal popup Add info Card=============== -->
<div class="modal fade" id="Modal-Popup-Add-Info-Card-Simple" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-family: Kh KoulenL;">បន្ថែមព័ត៏មាន</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- start image -->
                    <div class="mb-4">
                        <div class="d-none">
                            <input type="file" class="form-control" id="chooseImage-Slide-Card-Simple" name="chooseImage-Slide-Card-Simple">
                        </div>
                        <div class="" style="width: 100%; height: 350px">
                            <img src="" alt="" name="showImageChoose-Slide-Card-Simple" id="showImageChoose-Slide-Card-Simple" style="border-radius: 5px;width: 100%; height: 300px">
                            <div class="text-center mt-3">
                                <label for="" class="btn btn-primary" style="font-family: Kh Battambang;" id="SelectImage-Slide-Card-Simple">ជ្រើសរើសរូបភាព</label>
                            </div>
                        </div>
                    </div>
                    <!-- end image -->

                    <div class="d-flex row g-2">
                        <!-- start title -->
                        <div class="mb-3 col-12 col-sm-6 form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="title-name-Slide-Card-Simple" name="title-name-Slide-Card-Simple" style="height: 100px"></textarea>
                            <label for="title-name-Slide" style="font-family: Kh Battambang;">ចំណងជើង</label>
                        </div>
                        <!-- end title -->

                        <!-- start detail -->
                        <div class="mb-3 col-12 col-sm-6 form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="detail-title-Slide-Card-Simple" name="detail-title-Slide-Card-Simple" style="height: 100px"></textarea>
                            <label for="detail-title-Slide-Card-Simple" style="font-family: Kh Battambang;">ពិពណ៌នាបន្ថែម</label>
                        </div>
                        <!-- end detail -->
                    </div>
                </div>

                <!-- Start submit button -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="font-family: Kh Battambang;" name="Add-info-Card-Simple" id="Add-info-Card-Simple">រក្សាទុក</button>
                </div>
                <!-- End submit button -->
            </form>
        </div>
    </div>
</div>
<!-- ============== End Modal popup Add Card=============== -->
