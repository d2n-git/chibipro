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
                    <form action="<?php echo base_url(); ?>/Upload/UploadFile/updatePictures?id=<?php echo $Picture['idPictures']; ?>" method="post" style="margin-top: 10px; margin-bottom: 10px;" enctype="multipart/form-data" id="form1">
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá tiêu chuẩn</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>50 CBs</h6>
                                <input type="hidden" name="standarprice" id="standarprice" value="200">
                            </div>
                            <!-- <div class="col-md-6" style="text-align: right;">
                                <h6>Đơn vị tính: Nghìn Đồng</h6>
                            </div> -->
                        </div>
                        <?php if(isset($Confirm) && $Picture['idStatusPicture']=='3'): ?>
                            <div class="row register-form" style="margin-top: 5px;" id="areaPainter">
                                <div class="col-md-3">
                                    <h6 style="color:red;">Báo giá của Painter</h6>
                                </div>
                                <div class="col-md-9">
                                    <div class="row" style="margin-left: 0px;">
                                        <div class="col-md-4">
                                            <input class="form-control single-input" name="priceofuser" id="priceofuser" type="text" autocomplete="off" maxlength="10" value="<?php echo floatval($Confirm['Price'])?>" disabled style="color:red;">
                                        </div>
                                        <div class="col-md-8">
                                            <input class="btnAccept" type="button" value="ĐỒNG Ý" name="btnAccept" id="btnAccept" onclick="updateStatus('4')" />
                                            <input class="btnCancel" type="button" value="HỦY" name="btnCancel" id="btnCancel" onclick="updateStatus('5')" />
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="idPainter" id="idPainter" value="<?php echo $Confirm['idPainter']?>">
                            </div>
                        <?php else: ?>
                            <div class="row register-form">
                                <div class="col-md-3">
                                    <h6>Giá yêu cầu</h6>
                                </div>
                                <div class="col-md-9">
                                <div class="row" style="margin-left: 0px;">
                                    <div class="col-md-4">
                                        <input class="form-control single-input" name="priceofuser" id="priceofuser" type="text" autocomplete="off" maxlength="10" value = "<?php echo floatval($Picture['PriceOfUser'])?>">
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
                            <div class="row" style="margin-left: 0px;">
                                <div class="col-md-4">
                                    <?php if (isset($Confirm) && $Picture['idStatusPicture']=='3'): ?>
                                        <input type="date" class="form-control"style="background-color:#e9ecef" id="start" name="dateExpiry" value="<?php echo ($Picture['DateExpiry'] ??  date("Y-m-d")); ?>" readonly>
                                    <?php else: ?>
                                        <input type="date" class="form-control" id="start" name="dateExpiry" value="<?php echo ($Picture['DateExpiry'] ?? date("d/m/Y")); ?>" min="<?php echo date("d/m/Y"); ?>" max="2030-12-31">
                                    <?php endif; ?>
                                </div>
                            </div>
                            </div>
                        </div>

                        <?php if (isset($Confirm) && $Picture['idStatusPicture']=='3'): ?>
                            <div class="row register-form">
                                <div class="col-md-3">
                                    <h6 style="padding-top: 10px;">Hình nền</h6>
                                </div>
                                <div class="col-md-3 margin-10px" >
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
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['BackgroundPicture']; ?>" data-action="zoom"/>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="row register-form margin-10px">
                                <div class="col-md-3">
                                    <h6>Ghi chú</h6>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control w-100" name="message" id="message" cols="10" rows="3" maxlength="300" readonly><?php echo $Picture['Note']?></textarea>
                                </div>
                            </div>
                        <?php else: ?>
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
                                <div class="col-md-7">
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
                                <textarea class="form-control w-100" name="message" id="message" cols="10" rows="3" maxlength="300"><?php echo $Picture['Note']?></textarea>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($Confirm) && $Picture['idStatusPicture']=='3') { ?>
                            <div class="row register-form margin-10px" id="txtStatus">
                                <div class="col-md-3">
                                    <h6>Trạng thái</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="badge-success d-inline-block px-4 rounded-sm text-white"> Hình của bạn đã được Painter báo giá vẽ. </br>Nếu đồng ý hãy bấm nút ĐỒNG Ý để được vẽ hình Chibi</div>
                                </div>
                            </div>
                        <?php }else if(in_array($Picture['idStatusPicture'],['4'])) { ?>
                            <div class="row register-form margin-10px" id="txtStatus">
                                <div class="col-md-3">
                                    <h6>Trạng thái</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="badge-info d-inline-block px-4 rounded-sm text-white"> Hình của bạn đang được vẽ Chibi.</div>
                                </div>
                            </div>
                        <?php }else if(in_array($Picture['idStatusPicture'],['7'])) { ?>
                            <div class="row register-form margin-10px" id="txtStatus">
                                <div class="col-md-3">
                                    <h6>Trạng thái</h6>
                                </div>
                                <div class="col-md-8">
                                    <div class="badge-info d-inline-block px-4 rounded-sm text-white"> Hình của bạn đã được vẽ xong. </br> Đang được upload lên</div>
                                </div>
                            </div>
                        <?php }else { ?>
                            <div class="row register-form">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <input id="btn_delete" type="button" class="btnDelete" value="Xóa ảnh" name="btnDelete" style="margin-bottom: 10px; margin-right: 20px; width: 140px;" onclick="deleteIamge('0');"/>
                                    <input id="btn_confirm" type="submit" class="btnFinish" value="Lưu lại" name="btnSubmit" style="margin-bottom: 10px; width: 140px;"/>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="itype" id="itype" value="0">
                        <input type="hidden" name="idPrice" id="idPrice" value="0">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Xóa Ảnh</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span id="message-error">Bạn có chắc muốn xóa ảnh này ?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 20px;">Hủy</button>
        <button type="button" class="btn btn-danger" onclick="deleteIamge('1')">Xóa</button>
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

    function deleteIamge(itype){
      switch(itype){
        case '0':
          $('#messageModal').modal('show');
          break;
        case '1':
          $("#itype").val('1');
          $("#form1").submit();
          break;
      }
    }

    function updateStatus(status){
        let itype = '2';
        let idPrice = $('#idPrice').val();
        let idPainter = $('#idPainter').val();
        const data = {
            status, itype, idPrice, idPainter
        };
        $.ajax({
                url: '<?php echo base_url();?>/Upload/UploadFile/updatePictures?id=<?php echo $Picture['idPictures']; ?>',
                type : "post",
                dataType:'json',
                data : data,
                success : function(data) {
                    alert(data.message);
                    location.reload();
                },
                error : function(data) {
                    // do something
                }
            });
    }
</script>