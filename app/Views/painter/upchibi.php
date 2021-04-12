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
            <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['Name']; ?>" data-action="zoom"/>
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
                        ?>" data-action="zoom"/>
                <?php else: ?>
                    <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['BackgroundPicture']; ?>" data-action="zoom"/>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class=" col-lg-9 col-md-9 confirm-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form id="form1" action="<?php echo base_url(); ?>/Painter/Painter/uploadChibi" method="post" enctype="multipart/form-data" onsubmit="submitUpload(this);" style="margin-top:10px;">
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá User yêu cầu</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <h6><?php echo floatval($Picture['PriceOfUser']); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Giá vẽ</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-4">
                                    <h6><?php echo floatval($Picture['Price']); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ngày User Yêu cầu</h6>
                            </div>
                            <div class="col-md-9">
                            <div class="col-md-4">
                                <input type="date" class="form-control" style="background-color:#e9ecef" id="dateExpiryReq" name="dateExpiryReq" value="<?php echo ($Picture['dateExpiryReq'] ?? date("d/m/Y")); ?>" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ngày hoàn thành</h6>
                            </div>
                            <div class="col-md-9">
                            <div class="col-md-4">
                                <input type="date" class="form-control" style="background-color:#e9ecef" id="dateExpiryPainter" name="dateExpiryPainter" value="<?php echo ($Picture['DateExpiry'] ??  date("Y-m-d")); ?>" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ghi chú của User</h6>
                            </div>
                            <div class="col-md-9">
                                <textarea style="background-color:#e9ecef" name="note_user" id="note_user" cols="60" rows="3" class="form-control" readonly><?php echo $Picture['Note']; ?></textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ghi chú của Painter</h6>
                            </div>
                            <div class="col-md-9">
                                <textarea name="note_painter" id="note_painter" cols="60" rows="3" class="form-control"><?php echo $Picture['ExtraDetail']; ?></textarea>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Upload ảnh Chibi</h6>
                            </div>
                            <div class="col-md-3">
                                <div class="input-images"></div>
                            </div>
                            <div hidden id="areaupload">
                                <img id="blah" />
                            </div>
                            <div class="col-md-1"></div>
                            <?php if ($Picture['chibiFileName']!=''): ?>
                                <div class="col-md-3">
                                    <img id="" src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $Picture['idUser'].'/'.$Picture['chibiFileName']; ?>" data-action="zoom"/>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div hidden>
                            <input type="hidden" name="idPictures" id="idPictures" value="<?php echo $Picture['idPictures'];?>">
                            <input type="hidden" name="idUser" id="idUser" value="<?php echo $Picture['idUser'];?>">
                            <input type="hidden" name="itype" id="itype" value="">
                            <input type="hidden" name="oldChibiName" id="oldChibiName" value="<?php echo $Picture['chibiFileName'];?>">
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3"></div>
                            <div class="col-md-6" style="text-align: right;">
                                <input id="btn_finish" type="button" class="btnDelete" value="Hoàn thành" name="btn_finish" style="margin-bottom:10px; margin-right:20px; width:140px;" onclick="finishPaint('0');"/>
                                <input id="btn_submit" type="submit" class="btnFinish" value="Lưu lại" name="btnSubmit" style="margin-bottom:10px; width:140px;"/>
                            </div>
                        </div>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span id="message-error"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f1f1f1;">
        <h5 class="modal-title" id="exampleModalLongTitle">Hoàn Thành Ảnh Chibi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="message-error">Bấm vào OK sẽ gửi ảnh Chibi cho khách.</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 20px;">Hủy</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="finishPaint('1')">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- Hiệu ứng loading -->
<div class="load" >
    <img src="<?php echo base_url(); ?>/assets/img/loading.gif">
</div>
<script>
    $(document).ready(() => {
        $('.load').delay(1000).fadeOut('fast'); 
        $(function(){
            $('.input-images').imageUploader();
        });
    })

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

    function finishPaint(itype){
        switch(itype){
            case '0':
                $('#confirmModal').modal('show');
                break;
            case '1':
                $("#itype").val('end');
                $("#form1").submit();
                break;
        }
    }
    function submitUpload(e){
        $('.load').fadeIn('fast');
        event.preventDefault();
        var formData = new FormData(e);
        $.ajax({
            url: '<?php echo base_url();?>/Painter/Painter/uploadChibi',
            data: formData,
            type: "POST",
            contentType: false,
            processData: false, 
            success : function(data){
                console.log(data);
                let response = JSON.parse(data);
                $('.load').fadeOut('fast');
                $('#message-error').html(response.message);
                $('#messageModal').modal('show');
                if(response.status == 1){
                    $('#form1').trigger("reset");
                    $('#areaupload').attr('hidden',true);
                    window.location.href = '<?php echo base_url();?>' + '/Painter/Painter';
                }
            }
        });
        return false;
    }
</script>