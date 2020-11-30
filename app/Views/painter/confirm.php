<div class="container confirm">
    <div class="row">
        <div class="col-lg-3 col-md-3 confirm-left">
            <h4>Thông Tin Đăng Ảnh</h4>
            <img src="<?php echo base_url(); ?>/assets/img/<?php echo $Picture['Name']; ?>" />
            <button type="button" class="btnDownload">Download</button>
        </div>
        <div class=" col-lg-9 col-md-9 confirm-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>/Painter/confirm/confirmPainter?id=<?php echo $Picture['idPictures']; ?>" method="post" style="margin-top: 10px;">
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá tiêu chuẩn</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $Picture['StandarPrice']; ?></h6>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <h6>Đơn vị:Nghìn Đồng</h6>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá User yêu cầu</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <h6><?php echo $Picture['PriceOfUser']; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá max hiện tại</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <h6><?php echo $Picture['MaxPrice']; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Báo giá</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <input size="10" type="number" id="firstName" class="form-control " name="price" placeholder="Price" value="<?php echo $Picture['Price']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ngày hoàn thành</h6>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="start" name="dateExpiry" value="<?php echo ($Picture['DateExpiry'] ??  date("Y-m-d")); ?>" min="2020-01-01" max="2030-12-31">
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Chi tiết phụ</h6>
                            </div>
                            <div class="col-md-9">
                                <textarea name="form-control" id="" cols="60" rows="2" class="textAreaStyle" readonly><?php echo $Picture['ExtraDetail']; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ghi chú</h6>
                            </div>
                            <div class="col-md-9">
                                <textarea name="note" id="" cols="60" rows="3" class="textAreaStyle"><?php echo $Picture['Note']; ?></textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <input id="btn_confirm" type="submit" class="btnFinish" value="OK" name="btnSubmit" />
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
        $('#confirmPass').focusout(function() {
            var valuePassword = document.getElementById("pass").value;
            var valueConfirmPassword = document.getElementById("confirmPass").value;
            if (valuePassword !== valueConfirmPassword) {
                window.alert("The two passwords not match");
            }
        });
    });
</script>