<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <h4>Thông Tin Đăng Ảnh</h4>
            <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['Name']; ?>" />
        </div>
        <div class="col-lg-9 col-md-9 confirm-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>/Upload/UploadFile/updatePictures?id=<?php echo $Picture['idPictures']; ?>" method="post" style="margin-top: 10px;" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>User Name</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $Picture['idUser'].'_'.str_replace("*-*-"," ",$Picture['userName']); ?></h6>
                            </div>
                            <div class="col-md-3">
                                <h6>idPictures</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $Picture['idPictures'] ?></h6>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Painter Name</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $Picture['idUser'].'_'.str_replace("*-*-"," ",$Picture['userName']); ?></h6>
                            </div>
                            <div class="col-md-3">
                                <h6>idPainter</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $Picture['idPainter'] ?></h6>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Email</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>Email@Email.com</h6>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá tiêu chuẩn</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>50 CBs</h6>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá User yêu cầu</h6>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-10" style="padding-left: 0px; padding-right: 0px;">
                                    <input class="form-control single-input" name="priceofuser" id="priceofuser" type="text" autocomplete="off" maxlength="10" value="<?php echo floatval($Picture['PriceOfUser']) ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6>Giá Painter</h6>
                            </div>
                            <div class="col-md-3" style="padding-left: 0px; padding-right: 0px;">
                                <div class="col-md-10">
                                    <input class="form-control single-input" name="priceofuser" id="priceofuser" type="text" autocomplete="off" maxlength="10" value="<?php echo floatval($Picture['PriceOfUser']) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ngày Up</h6>
                            </div>
                            <div class="col-md-3" style="padding-left: 0px; padding-right: 0px;">
                                <div class="col-md-11">
                                    <input class="form-control" type="date" id="update" name="dateExpiry" value="<?php echo date('Y-m-d') ?>" min="2020-01-01" max="2030-12-31">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6>Ngày hoàn thành</h6>
                            </div>
                            <div class="col-md-3" style="padding-left: 0px; padding-right: 0px;">
                                <div class="col-md-11">
                                    <input class="form-control" type="date" id="endate" name="dateExpiry" value="<?php echo date('Y-m-d') ?>" min="2020-01-01" max="2030-12-31">
                                </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Status</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $Picture['idStatusPicture']?></h6>
                            </div>
                            <div class="col-md-3">
                                <h6>Flag</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $Picture['idPictures']?></h6>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Hình nền</h6>
                            </div>
                            <div class="col-md-3">
                                <?php if($Picture['BackgroundPicture'] != null) :?>
                                    <?php if(in_array($Picture['BackgroundPicture'],['bg1','bg2','bg3','bg4','bg5','bg6'])):?>
                                        <img src="<?php echo base_url(); ?>/assets/img/bg_def/<?php
                                            switch ($Picture['BackgroundPicture']){
                                                case 'bg1':
                                                    echo '1_cau-vang.png';
                                                    break;
                                                case 'bg2':
                                                    echo '2_sea.png';
                                                    break;
                                                case 'bg3':
                                                    echo '3_chua.png';
                                                    break;
                                                case 'bg4':
                                                    echo '4_city.png';
                                                    break;
                                                case 'bg5':
                                                    echo '5_park.png';
                                                    break;
                                                case 'bg6':
                                                    echo '6_autumn.png';
                                                    break;
                                            }
                                            ?>" data-action="zoom"/>
                                            <a href="#" data-href="<?php echo base_url(); ?>/assets/img/bg_def/<?php
                                            switch ($Picture['BackgroundPicture']){
                                                case 'bg1':
                                                    echo '1_cau-vang.png';
                                                    break;
                                                case 'bg2':
                                                    echo '2_sea.png';
                                                    break;
                                                case 'bg3':
                                                    echo '3_chua.png';
                                                    break;
                                                case 'bg4':
                                                    echo '4_city.png';
                                                    break;
                                                case 'bg5':
                                                    echo '5_park.png';
                                                    break;
                                                case 'bg6':
                                                    echo '6_autumn.png';
                                                    break;
                                            }
                                            ?>" class="btn btn-success btnDownload" downloadname="<?php echo $Picture['idPictures']; ?>_Capture_Background.png" onclick='forceDownload(this)' hidden id="background"> 
                                            </a>
                                    <?php else: ?>
                                        <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['BackgroundPicture']; ?>" data-action="zoom"/>
                                        <a href="#" data-href="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['BackgroundPicture']; ?>" class="btn btn-success btnDownload" downloadname="<?php echo $Picture['idPictures']; ?>_Capture_Background.png" onclick="forceDownload(this);" id="background" hidden> 
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <?php if($Picture['chibiFileName'] != null) :?>
                                    <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['chibiFileName']; ?>" data-action="zoom"/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9">
                                <div class="col-12 col-md-6" style="padding-top: 0px;color: #6f6862;" id="ibgImage" <?php if($Picture['BackgroundPicture'] == '') echo 'hidden'?>>
                                    <?php echo $Picture['BackgroundPicture']?>
                                </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ghi chú</h6>
                            </div>
                            <div class="col-md-8">
                            <textarea class="form-control w-100" name="message" id="message" cols="10" rows="3" maxlength="300"></textarea>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-5">
                            </div>
                            <div class="col-md-4" style="text-align: right;">
                                <input id="btn_confirm" type="submit" class="btnFinish" value="OK" name="btnSubmit" style="margin-bottom: 10px;"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#priceofuser').on('keyup', function(event) {
            event.preventDefault();
            /* Act on the event */
            let result = formatMoney($(this).val());
            $(this).val(result == 0 ? '' : result);
        });
    });
</script>