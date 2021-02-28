<style>
li {
  display: inline-block;
}

input[type="radio"][id^="cb"] {
  display: none;
}

label {
  border: 1px solid #fff;
  padding: 5px;
  display: block;
  position: relative;
  margin: 5px;
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
  width: 150px;
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

.btnOk{
    float: left;
    /* margin-top: 2%; */
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    color: #fff;
    font-weight: 600;
    width: 120px;
    cursor: pointer;
    margin-left: 10px;
}
</style>
<div class="container confirm">
    <div class="row">
        <div class="col-lg-3 col-md-3 confirm-left">
            <h4>Thông Tin Đăng Ảnh</h4>
            <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['Name']; ?>" />
        </div>
        <div class=" col-lg-9 col-md-9 confirm-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>/Upload/UploadFile/updatePictures?id=<?php echo $Picture['idPictures']; ?>" method="post" style="margin-top: 10px;" enctype="multipart/form-data" id="form1">
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá tiêu chuẩn</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>200K</h6>
                                <input type="hidden" name="standarprice" id="standarprice" value="200">
                            </div>
                            <!-- <div class="col-md-6" style="text-align: right;">
                                <h6>Đơn vị tính: Nghìn Đồng</h6>
                            </div> -->
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá yêu cầu</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <input class="form-control single-input" name="priceofuser" id="priceofuser" type="text" autocomplete="off" maxlength="10" value = "<?php echo $Picture['PriceOfUser']?>">
                                </div>
                            </div>
                        </div>
                        <?php if(isset($Confirm)): ?>
                        <div class="row register-form" style="margin-top: 5px;" id="areaPainter">
                            <div class="col-md-3">
                                <h6 style="color:red;">Báo giá của Painter</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="row" style="margin-left: 0px;">
                                    <div class="col-md-4">
                                        <input class="form-control single-input" name="priceofuser" id="priceofuser" type="text" autocomplete="off" maxlength="10" value="<?php echo $Confirm['Price']?>" disabled style="color:red;">
                                    </div>
                                    <div class="col-md-8">
                                        <input class="btnOk" type="button" value="ĐỒNG Ý" name="btnSubmit" style="background-color: #33cc33;" onclick="updateStatus('3')" id="btnOk2"/>
                                        <input class="btnOk" type="button" value="HỦY" name="btnSubmit" style="background-color: #ccccb3;" onclick="updateStatus('1')" id="btnCancel"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ngày hoàn thành</h6>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="start" name="dateExpiry" value="<?php echo date('Y-m-d') ?>" min="2020-01-01" max="2030-12-31">
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6 style="padding-top: 10px;">Chọn hình nền</h6>
                            </div>
                            <div class="col-md-9">
                            <ul>
                                <li><input type="radio" id="cb1" name="ch1" value="bg1" <?php if($Picture['BackgroundPicture'] == 'bg1') echo 'checked'?>/>
                                    <label for="cb1"><img src="<?php echo base_url(); ?>/assets/img/bg_def/1_cau-vang.png" /></label>
                                </li>
                                <li><input type="radio" id="cb2" name="ch1" value="bg2" <?php if($Picture['BackgroundPicture'] == 'bg2') echo 'checked'?>/>
                                    <label for="cb2"><img src="<?php echo base_url(); ?>/assets/img/bg_def/2_sea.png" /></label>
                                </li>
                                <li><input type="radio" id="cb3" name="ch1" value="bg3" <?php if($Picture['BackgroundPicture'] == 'bg3') echo 'checked'?>/>
                                    <label for="cb3"><img src="<?php echo base_url(); ?>/assets/img/bg_def/3_chua.png" /></label>
                                </li>
                                <li><input type="radio" id="cb4" name="ch1" value="bg4" <?php if($Picture['BackgroundPicture'] == 'bg4') echo 'checked'?>/>
                                    <label for="cb4"><img src="<?php echo base_url(); ?>/assets/img/bg_def/4_city.png" /></label>
                                </li>
                                <li><input type="radio" id="cb5" name="ch1" value="bg5" <?php if($Picture['BackgroundPicture'] == 'bg5') echo 'checked'?>/>
                                    <label for="cb5"><img src="<?php echo base_url(); ?>/assets/img/bg_def/5_park.png" /></label>
                                </li>
                                <li><input type="radio" id="cb6" name="ch1" value="bg6" <?php if($Picture['BackgroundPicture'] == 'bg6') echo 'checked'?>/>
                                    <label for="cb6"><img src="<?php echo base_url(); ?>/assets/img/bg_def/6_autumn.png" /></label>
                                </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6 style="padding-top: 10px;">Up hình nền</h6>
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
                            <textarea class="form-control w-100" name="message" id="message" cols="10" rows="3"><?php echo $Picture['Note']?></textarea>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <input id="btn_delete" type="button" class="btnFinish" value="Xóa ảnh" name="btnDelete" style="margin-bottom: 10px; margin-right: 10px; width: 140px; background-color: #ffa31a;" onclick="deleteIamge('0');"/>
                                <input id="btn_confirm" type="submit" class="btnFinish" value="OK" name="btnSubmit" style="margin-bottom: 10px; width: 140px;"/>
                            </div>
                        </div>
                        <input type="hidden" name="type" id="type" value="0">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f1f1f1;">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span id="message-error">Bạn có chắc muốn xóa ảnh này ?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-secondary" style="background-color: red;" onclick="deleteIamge('1')">Xóa</button>
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
        
        $('#priceofuser').on('keyup', function(event) {
            event.preventDefault();
            /* Act on the event */
            let result = formatMoney($(this).val());
            $(this).val(result == 0 ? '' : result);
        });
    });

    function deleteIamge(type){
      switch(type){
        case '0':
          $('#messageModal').modal('show');
          break;
        case '1':
          $("#type").val('1');
          $("#form1").submit();
          break;
      }
    }

    function updateStatus(status){
        let type = '2'
        const data = {
            status,type
        };
        $.ajax({
                url: '<?php echo base_url();?>/Upload/UploadFile/updatePictures?id=<?php echo $Picture['idPictures']; ?>',
                type : "post",
                dataType:'json',
                data : data,
                success : function(data) {
                    alert(data.message);
                    if(status == '1'){
                        $('#areaPainter').hide();
                    }else if(status == '3'){
                        $('#btnOk2').hide();
                        $('#btnCancel').hide();
                    }
                },
                error : function(data) {
                    // do something
                }
            });
    }
</script>