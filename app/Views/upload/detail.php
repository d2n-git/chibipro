<style>
    li {
  display: inline-block;
}

input[type="radio"][id^="cb"] {
  display: none;
}

label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

label::before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked+label {
  border-color: #ddd;
}

:checked+label::before {
  content: "✓";
  background-color: green;
  transform: scale(1);
}

:checked+label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}
</style>
<div class="container confirm">
    <div class="row">
        <div class="col-lg-3 col-md-3 confirm-left">
            <h4>Thông Tin Đăng Ảnh</h4>
            <img src="<?php echo base_url(); ?>/assets/img/<?php echo $Picture['Name']; ?>" />
        </div>
        <div class=" col-lg-9 col-md-9 confirm-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>/Upload/UploadFile/updatePictures?id=<?php echo $Picture['idPictures']; ?>" method="post" style="margin-top: 10px;" enctype="multipart/form-data">
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá tiêu chuẩn</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>200</h6>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <h6>Đơn vị:Nghìn Đồng</h6>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá user yêu cầu</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                <input class="form-control single-input" name="priceofuser" id="phone" type="text">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ngày hoàn thành</h6>

                            </div>
                            <div class="col-md-9">
                                <input type="date" id="start" name="dateExpiry" value="2020-07-22" min="2020-01-01" max="2030-12-31">
                            </div>
                        </div>
                        
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Chọn hình nền</h6>
                            </div>
                            <div class="col-md-9">
                            <ul>
                                <li><input type="radio" id="cb1" name="ch1" value="bg1"/>
                                    <label for="cb1"><img src="<?php echo base_url(); ?>/assets/img/bg1.jpg" /></label>
                                </li>
                                <li><input type="radio" id="cb2" name="ch1" value="bg2"/>
                                    <label for="cb2"><img src="<?php echo base_url(); ?>/assets/img/bg2.jpg" /></label>
                                </li>
                                <li><input type="radio" id="cb3" name="ch1" value="bg3"/>
                                    <label for="cb3"><img src="<?php echo base_url(); ?>/assets/img/bg3.jpg" /></label>
                                </li>
                                <li><input type="radio" id="cb4" name="ch1" value="bg4"/>
                                    <label for="cb4"><img src="<?php echo base_url(); ?>/assets/img/bg4.jpg" /></label>
                                </li>
                                <li><input type="radio" id="cb5" name="ch1" value="bg5"/>
                                    <label for="cb5"><img src="<?php echo base_url(); ?>/assets/img/bg5.jpg" /></label>
                                </li>
                                <li><input type="radio" id="cb6" name="ch1" value="bg6"/>
                                    <label for="cb6"><img src="<?php echo base_url(); ?>/assets/img/bg6.jpg" /></label>
                                </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Up hình nền</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload"
                                    aria-describedby="inputGroupFileAddon01" class="single-input" onchange="readURL(this);">
                                    <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9">
                                <div class=" col-12 col-md-6" style="margin-top: 10px;" hidden id="areaupload">
                                        <img id="blah" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ghi chú</h6>
                            </div>
                            <div class="col-md-8">
                            <textarea class="form-control w-100" name="message" id="message" cols="10" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6" style="text-align: right;">
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
        $('#confirmPass').focusout(function() {
            var valuePassword = document.getElementById("pass").value;
            var valueConfirmPassword = document.getElementById("confirmPass").value;
            if (valuePassword !== valueConfirmPassword) {
                window.alert("The two passwords not match");
            }
        });
    });
</script>