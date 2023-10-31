<div class="container">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- <div class="carousel-item active">
                <img src="../asset/image/slide1.jpg" class="d-block w-100 rounded-bottom" alt="Slide" style="height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                        <button type="button" class="btn btn-danger" style="font-family: Kh Battambang;" id="Edit_Slide">កែប្រែ</button>
                        <button type="button" class="btn btn-primary" style="font-family: Kh Battambang;" id="Add_NewSlide">បន្ថែម</button>
                    </div>
                </div>
            </div> -->

            <!-- <div class="carousel-item">
                <img src="../asset/image/slide2.jpg" class="d-block w-100 rounded-bottom" alt="Slide" style="height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                        <button type="button" class="btn btn-danger" style="font-family: Kh Battambang;">កែប្រែ</button>
                        <button type="button" class="btn btn-primary" style="font-family: Kh Battambang;">បន្ថែម</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../asset/image/slide3.jpg" class="d-block w-100 rounded-bottom" alt="Slide" style="height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                        <button type="button" class="btn btn-danger" style="font-family: Kh Battambang;">កែប្រែ</button>
                        <button type="button" class="btn btn-primary" style="font-family: Kh Battambang;">បន្ថែម</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../asset/image/slide4.jpg" class="d-block w-100 rounded-bottom" alt="Slide" style="height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                        <button type="button" class="btn btn-danger" style="font-family: Kh Battambang;">កែប្រែ</button>
                        <button type="button" class="btn btn-primary" style="font-family: Kh Battambang;">បន្ថែម</button>
                    </div>
                </div>
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>



<!-- ============== Start Modal popup update info Slide=============== -->
<div class="modal fade" id="Modal-Popup-Update-Info-Slide" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-family: Kh KoulenL;">កែប្រែព័ត៏មាន</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- start image -->
                    <div class="mb-4">
                        <div class="d-none">
                            <input type="file" class="form-control" id="chooseImage-Slide" name="chooseImage-Slide">
                        </div>
                        <div class="" style="width: 100%; height: 350px">
                            <img src="" alt="" name="showImageChoose-Slide" id="showImageChoose-Slide" style="border-radius: 5px;width: 100%; height: 300px">
                            <div class="text-center mt-3">
                                <label for="" class="btn btn-primary" style="font-family: Kh Battambang;" id="SelectImage-Slide">ជ្រើសរើសរូបភាពថ្មី</label>
                            </div>
                        </div>
                    </div>
                    <!-- end image -->

                    <div class="d-flex row g-2">
                        <!-- start title -->
                        <div class="mb-3 col-12 col-sm-6 form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="title-name-Slide" name="title-name-Slide" style="height: 100px"></textarea>
                            <label for="title-name-Slide" style="font-family: Kh Battambang;">ចំណងជើង</label>
                        </div>
                        <!-- end title -->

                        <!-- start detail -->
                        <div class="mb-3 col-12 col-sm-6 form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="detail-title-Slide" name="detail-title-Slide" style="height: 100px"></textarea>
                            <label for="detail-title-Slide" style="font-family: Kh Battambang;">ពិពណ៌នាបន្ថែម</label>
                        </div>
                        <!-- end detail -->
                    </div>
                </div>

                <!-- Start submit button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" style="font-family: Kh Battambang;" name="delete-info-Slide" id="delete-info-Slide">លុប</button>
                    <input type="hidden" name="hide-id" id="hide-id">
                    <button type="submit" class="btn btn-primary" style="font-family: Kh Battambang;" name="save-info-Slide" id="save-info-Slide">រក្សាទុក</button>
                </div>
                <!-- End submit button -->
            </form>
        </div>
    </div>
</div>
<!-- ============== End Modal popup update info Slide=============== -->



<!-- ============== Start Modal popup Add info Slide=============== -->
<div class="modal fade" id="Modal-Popup-Add-Info-Slide" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <input type="file" class="form-control" id="chooseImage-Slide-New" name="chooseImage-Slide-New">
                        </div>
                        <div class="" style="width: 100%; height: 350px">
                            <img src="" alt="" name="showImageChoose-Slide-New" id="showImageChoose-Slide-New" style="border-radius: 5px;width: 100%; height: 300px">
                            <div class="text-center mt-3">
                                <label for="" class="btn btn-primary" style="font-family: Kh Battambang;" id="SelectImage-Slide-New">ជ្រើសរើសរូបភាព</label>
                            </div>
                        </div>
                    </div>
                    <!-- end image -->

                    <div class="d-flex row g-2">
                        <!-- start title -->
                        <div class="mb-3 col-12 col-sm-6 form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="title-name-Slide-New" name="title-name-Slide-New" style="height: 100px"></textarea>
                            <label for="title-name-Slide" style="font-family: Kh Battambang;">ចំណងជើង</label>
                        </div>
                        <!-- end title -->

                        <!-- start detail -->
                        <div class="mb-3 col-12 col-sm-6 form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="detail-title-Slide-New" name="detail-title-Slide-New" style="height: 100px"></textarea>
                            <label for="detail-title-Slide-New" style="font-family: Kh Battambang;">ពិពណ៌នាបន្ថែម</label>
                        </div>
                        <!-- end detail -->
                    </div>
                </div>

                <!-- Start submit button -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="font-family: Kh Battambang;" name="Add-info-Slide" id="Add-info-Slide">រក្សាទុក</button>
                </div>
                <!-- End submit button -->
            </form>
        </div>
    </div>
</div>
<!-- ============== End Modal popup Add info Slide=============== -->
