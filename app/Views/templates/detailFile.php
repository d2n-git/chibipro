<div class="container detail">
    <div class="row">
        <div class="col-lg-3 col-md-3 detail-left">
            <h4>Thông Tin Đăng Ảnh</h4>
            <img src="<?php echo base_url(); ?>/assets/img/6.jpg" />
        </div>
        <div class=" col-lg-9 col-md-9 detail-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="/Users/registration/InSertUser" method="post" style="margin-top: 10px;">
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
                                <h6>Giá User yêu cầu</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <input size="10" type="number" id="firstName" class="form-control " name="price" placeholder="Price" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px" >
                            <div class="col-md-3">
                                <h6>Ngày hoàn thành</h6>
                            </div>
                            <div class="col-md-9">
                                <h6>20/10/2020</h6>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Chọn hình nền</h6>
                            </div>
                            <div class="col-md-9">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td  class="Width-20"> 
                                            <input type="checkbox" >
                                            <img class="chooseImage"  src="<?php echo base_url(); ?>/assets/img/1.jpg"  />
                                            </td>
                                            <td  class="Width-20"> 
                                            <input type="checkbox" >
                                            <img class="chooseImage"  src="<?php echo base_url(); ?>/assets/img/2.jpg"  />
                                            </td>
                                            <td  class="Width-20"> 
                                            <input type="checkbox" >
                                            <img class="chooseImage"  src="<?php echo base_url(); ?>/assets/img/3.jpg"  />
                                            </td>
                                            <td  class="Width-20"> 
                                            <input type="checkbox" >
                                            <img class="chooseImage"  src="<?php echo base_url(); ?>/assets/img/4.jpg"  />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Up hình nền</h6>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div>
                        <div class="row register-form margin-10px" >
                            <div class="col-md-3">
                                <h6>Ghi chú</h6>
                            </div>
                            <div class="col-md-9">
                                <textarea name="form-control" id="" cols="60" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px" >
                            <div class="col-md-3" style="text-align: left;">
                            <input id="btn_Detail" type="submit" class="btnDetail" value="Finish" name="btnSubmit" />
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