<div class="container">
    <div class="mt-5">
        <div class="d-flex justify-content-center gap-2 mb-4">
            <div class="">
                <h3 style="font-family: Kh KoulenL;">បន្ទប់ VIP</h3>
            </div>
            <div class="" id="add-card-vip" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="បន្ថែម">
                <i class="ri-file-add-line btn btn-sm btn-outline-success"></i>
            </div>
        </div>
        <div class="main-card-vip-room d-flex gap-3 justify-content-center align-items-center flex-wrap">

            <?php

                // Fetch data from the database
                $sql = "SELECT vip_content.*, vip_content.vip_pathImg FROM vip_content
                        LEFT JOIN vip_img ON vip_content.vip_id = vip_img.img_id";
                $result = $conn->query($sql);

                if ($result === false) {
                    echo "Error: " . $conn->error;
                } else {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $vipTitle = $row['vip_title'];
                            $vipTitleDetail = $row['vip_title_detail'];
                            $imagePath = $row['vip_pathImg'];
                            $vip_contentId = $row['vip_id'];

                            // Output HTML for each card
                            echo '<div class="card mb-3 card-" style="max-width: 540px;cursor: pointer;" data-id="'.$vip_contentId.'" id="show-sub-content-detail">';
                            echo '<div class="row g-0">';
                            echo '<div class="col-md-4">';
                            echo '<img src="../asset/content/' . basename($imagePath) . '" class="img-fluid rounded-start" alt="">';
                            echo '</div>';
                            echo '<div class="col-md-8">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $vipTitle . '</h5>';
                            echo '<p class="card-text">' . $vipTitleDetail . '</p>';
                            echo '<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<h6 style='font-family: Kh Battambang;'>គ្មានទិន្នន័យទេ។</h6>";
                    }
                }

                // Close the database connection
                $conn->close();
            ?>


        </div>
    </div>
</div>



<!-- ============== Start Modal popup Add info Card=============== -->
<div class="modal fade" id="Modal-Popup-Add-Info-Card-Vip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-family: Kh KoulenL;">បន្ថែមព័ត៏មាន</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="vipForm" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- =================== start image ===================-->
                    <div class="d-flex flex-wrap">
                        <!-- =================== left ===================-->
                        <div class="col-12 col-xs-12 col-sm-6 pe-0 pe-sm-2 pe-md-2 pe-lg-2">
                            <div class="d-none">
                                <input type="file" class="form-control" id="chooseImage-Slide-Card-Vip" name="chooseImage-Slide-Card-Vip">
                            </div>
                            <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12" style="cursor: pointer;width: 100%;" id="showImageChoose-Slide-Card-Vip">
                                <div class="col-12 col-md-12 col-lg-6 card d-flex justify-content-center align-items-center" style="width: 100%;height: 305px;" >
                                    <i class="ri-file-add-line fs-1 text-secondary"></i>
                                    <span style="font-family: Kh Battambang; white-space: nowrap;">ជ្រើសរើសរូបភាព</span>
                                </div>
                            </div>
                        </div>
                        <!-- =================== end left ===================-->

                        <!-- ===================right ===================-->
                        <div class="col-xs-12 col-sm-6 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
                            <h4 style="font-family: Kh KoulenL;" class="text-center">មាតិការ</h4>

                            <!-- Add detail content info -->
                            <div class="">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">តម្លៃ</span>
                                    <input name="vip_price_dollar" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_price_dollar">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_price_real">
                                    <span class="input-group-text" style="font-family: Kh Battambang;">រ</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ទំហំ</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_size_width" name="vip_size_width">
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ទ</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_size_length" name="vip_size_length">
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ប</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">បន្ទប់</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_room_water" name="vip_room_water">
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ប/ទ</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_room_wc" name="vip_room_wc">
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ប/គ</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ទីតាំង</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_building" name="vip_building">
                                    <span class="input-group-text" style="font-family: Kh Battambang;">អ</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_floor" name="vip_floor">
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ជ</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ចំណងជើង</span>
                                    <input name="vip_title" id="vip_title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ពិពណ៌នា</span>
                                    <textarea name="vip_title_detail" id="vip_title_detail" rows="1"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- =================== end right ===================-->
                    </div>
                    <!-- =================== end image ===================-->


                    <!-- =================== start sub image ===================-->
                    <div class="d-flex flex-wrap gap-3 justify-content-center " id="main-add-image-vip">

                        <!-- add more card from addCard.JS -->

                    </div>
                    <!-- =================== end sub image ===================-->
                </div>

                <!-- =================== Start submit button =================== -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" style="font-family: Kh Battambang;" id="add-more-card-vip-btn">បន្ថែមរូបភាព</button>
                    <button type="submit" class="btn btn-primary" style="font-family: Kh Battambang;" name="Add-info-Card-Vip" id="Add-info-Card-Vip">រក្សាទុក</button>
                </div>
                <!-- =================== End submit button =================== -->
            </form>
        </div>
    </div>
</div>
<!-- ============== End Modal popup Add Card=============== -->



<!-- ============== Start Modal popup Show Sub Card=============== -->
<!-- <php include '../components/php/vipRoom/deleteCard.php';?> -->
<div class="modal fade" id="Modal-Popup-Show-Sub-Card-Vip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-family: Kh KoulenL;">បន្ថែមព័ត៏មាន</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="vipForm-Show-Modal" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- =================== start image ===================-->
                    <div class="d-flex flex-wrap">
                        <!-- =================== left ===================-->
                        <div class="col-12 col-xs-12 col-sm-6 pe-0 pe-sm-2 pe-md-2 pe-lg-2">
                            <div class="d-none">
                                <input type="file" class="form-control" id="chooseImage-Slide-Card-Vip-Show-Modal" name="chooseImage-Slide-Card-Vip-Show-Modal">
                            </div>
                            <div class="col-12 col-xs-12 col-md-12 col-sm-12 col-lg-12 border border-1 rounded" style="cursor: pointer;width: 100%;overflow: hidden;" id="showImageChoose-Slide-Card-Vip">
                                <div class="main-content-img-">
                                    <img src="" alt="" id="image_from_showCardSub" class="image_from_showCardSub" style="width: 100%;height: 305px;">
                                </div>
                                <div class="main-content-card- d-none">
                                    <div class="col-12 col-md-12 col-lg-6 card d-flex justify-content-center align-items-center" style="width: 100%;height: 305px;" >
                                        <i class="ri-file-add-line fs-1 text-secondary"></i>
                                        <span style="font-family: Kh Battambang; white-space: nowrap;">ជ្រើសរើសរូបភាព</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- =================== end left ===================-->

                        <!-- ===================right ===================-->
                        <div class="col-xs-12 col-sm-6 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
                            <h4 style="font-family: Kh KoulenL;" class="text-center">មាតិការ</h4>

                            <!-- Add detail content info -->
                            <div class="">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">តម្លៃ</span>
                                    <input name="vip_price_dollar_Show_Modal" type="text" class="form-control vip_price_dollar" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_price_dollar_Show_Modal" disabled/>
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_price_real_Show_Modal" disabled/>
                                    <span class="input-group-text" style="font-family: Kh Battambang;">រ</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ទំហំ</span>
                                    <input type="text" class="form-control vip_size_width" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_size_width_Show_Modal" name="vip_size_width_Show_Modal" disabled/>
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ទ</span>
                                    <input type="text" class="form-control vip_size_length" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_size_length_Show_Modal" name="vip_size_length_Show_Modal" disabled/>
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ប</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">បន្ទប់</span>
                                    <input type="text" class="form-control vip_room_water" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_room_water_Show_Modal" name="vip_room_water_Show_Modal" disabled/>
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ប/ទ</span>
                                    <input type="text" class="form-control vip_room_wc" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_room_wc_Show_Modal" name="vip_room_wc_Show_Modal" disabled/>
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ប/គ</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ទីតាំង</span>
                                    <input type="text" class="form-control vip_building" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_building_show_modal_Show_Modal" name="vip_building_show_modal_Show_Modal" disabled/>
                                    <span class="input-group-text" style="font-family: Kh Battambang;">អ</span>
                                    <input type="text" class="form-control vip_floor" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="vip_floor_show_modal_Show_Modal" name="vip_floor_show_modal_Show_Modal" disabled />
                                    <span class="input-group-text" style="font-family: Kh Battambang;">ជ</span>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ចំណងជើង</span>
                                    <input name="vip_title_Show_Modal" id="vip_title_Show_Modal" class="form-control vip_title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled/>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm" style="font-family: Kh Battambang;">ពិពណ៌នា</span>
                                    <textarea name="vip_title_detail_Show_Modal" id="vip_title_detail_Show_Modal" rows="1"  class="form-control vip_title_detail" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- =================== end right ===================-->
                    </div>
                    <!-- =================== end image ===================-->

                    <!-- =================== start sub image ===================-->
                    <div class="d-flex flex-wrap gap-3 justify-content-center main-add-image-vip" id="main-add-image-vip">

                        <!-- ======data form ShowCardSub.js======= -->

                    </div>
                    <!-- =================== end sub image ===================-->
                </div>

                <!-- =================== Start submit button =================== -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" style="font-family: Kh Battambang;" id="add-more-card-show-modal" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="បន្ថែមរូបភាព" disabled><i class="ri-image-add-line text-white"></i></button>
                    <button type="button" class="btn btn-danger" style="font-family: Kh Battambang;" name="delete-card-btn-show-modal" id="delete-card-btn-show-modal" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="លុប"><i class="ri-delete-bin-line"></i></button>
                    <button type="button" class="btn btn-success" style="font-family: Kh Battambang;" id="edit-card-vip-btn-show-modal">កែប្រែ</button>
                    <!-- <button type="submit" class="btn btn-primary" style="font-family: Kh Battambang;" name="save-info-card-vip-btn-show-modal" id="save-info-card-vip-btn-show-modal">រក្សាទុក</button> -->
                </div>
                <!-- =================== End submit button =================== -->
            </form>
        </div>
    </div>
</div>
<!-- ============== End Modal popup Show Sub Card=============== -->
