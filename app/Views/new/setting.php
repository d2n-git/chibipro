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
                    <form action="<?php echo base_url(); ?>/News/updateImage?id=<?php echo $Picture['idPictures']; ?>" method="post" style="margin-top: 10px;" enctype="multipart/form-data" id="form1">
                        <div class="row register-form">
                            <div class="col-md-3">
                                <h6>Title</h6>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control single-input" type="text" name="title" id="title" value="<?php echo $Picture['Title'];?>">
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Chế độ</h6>
                            </div>
                            <div class="col-md-9">
                                <input type="radio" name="mode" value="0" <?php if($Picture['idStatusPicture'] == '8') echo 'checked';?>> Public
                                <input type="radio" name="mode" value="1" style="margin-left: 10px;" <?php if($Picture['idStatusPicture'] == '9') echo 'checked';?>> Riêng tư
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Ghi chú</h6>
                            </div>
                            <div class="col-md-8">
                            <textarea class="form-control w-100" name="message" id="message" cols="10" rows="3"><?php echo $Picture['Note'];?></textarea>
                            </div>
                        </div>
                        <div class="row register-form">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9" >
                                <input id="btn_confirm" type="button" class="btnFinish" value="Xóa ảnh" name="btnDelete" style="margin-bottom: 10px; margin-right: 10px;  width: 140px; background-color: #ffa31a;" onclick="deleteIamge('0');"/>
                                <input id="btn_confirm1" type="submit" class="btnFinish" value="OK" name="btnSubmit" style="margin-bottom: 10px; width: 140px;"/>
                            </div>
                        </div>
                        <input type="hidden" name="itype" id="itype" value="0">
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

    
</script>