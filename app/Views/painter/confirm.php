<style>
.confirm-left img{
    margin-top: 5%;
    margin-bottom: 5%;
    width: 100%;
    height: auto !important;
    -webkit-animation: none !important;
    animation: none !important;
}
</style>
<div class="container confirm">
    <div class="row">
        <div class="col-lg-3 col-md-3 confirm-left">
            <h4>Thông Tin Đăng Ảnh</h4>
            <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['Name']; ?>" />
            <a href="#" data-href="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['Name']; ?>" class="btn btn-success btnDownload" downloadname="<?php echo $Picture['Name']; ?>" onclick='forceDownload(this)'> 
                Download
            </a>
            <?php if($Picture['BackgroundPicture'] != null) :?>
                <h6>Hình nền</h6>
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
                        ?>" />
                <?php else: ?>
                    <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['BackgroundPicture']; ?>" />
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class=" col-lg-9 col-md-9 confirm-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>/Painter/Confirm/confirmPainter?id=<?php echo $Picture['idPictures']; ?>" method="post" style="margin-top: 10px;">
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
                                <h6>Ngày Yêu cầu</h6>
                            </div>
                            <div class="col-md-9">
                                <input type="date" style="background-color:#e9ecef" id="endRequire" name="dateExpiryReq" value="<?php echo ($Picture['DateExpiry'] ?? date("d/m/Y")); ?>" readonly>
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
                                <h6>Ghi chú của User</h6>
                            </div>
                            <div class="col-md-9">
                                <textarea style="background-color:#e9ecef" name="note" id="" cols="60" rows="3" class="textAreaStyle" readonly><?php echo $Picture['ExtraDetail']; ?></textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ghi chú của Painter</h6>
                            </div>
                            <div class="col-md-9">
                                <textarea name="form-control" id="" cols="60" rows="3" class="textAreaStyle"><?php echo $Picture['Note']; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <input id="btn_confirm" type="submit" class="btnFinish" value="OK" name="btnSubmit" style="margin-bottom: 10px; width: 140px;"/>
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

    function forceDownload(link){
        var url = link.getAttribute("data-href");
        var fileName = link.getAttribute("downloadname");
        link.innerText = "Working...";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.responseType = "blob";
        xhr.onload = function(){
            debugger
            var urlCreator = window.URL || window.webkitURL;
            var imageUrl = urlCreator.createObjectURL(this.response);
            var tag = document.createElement('a');
            tag.href = imageUrl;
            tag.download = fileName;
            document.body.appendChild(tag);
            tag.click();
            document.body.removeChild(tag);
            link.innerText="Download";
        }
        xhr.send();
    }
</script>