  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Profile</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <div class="container" style="margin-top: 10vh; height: 70vh;">
      <div class="row">
        <div class="col-lg-10">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="form1">
            <div class="row">
            <div class="col-12">
                <div class="form-group">
                <label for="username">Họ tên</label>
                  <input class="form-control" name="username" id="username" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Họ tên'" placeholder='Họ tên' value="<?php echo $user['Name']?>">
                </div>
              </div>
              
              <div class="col-sm-6">
                <div class="form-group">
                <label for="phone">Điện thoại</label>
                  <input class="form-control single-input" name="phone" id="phone" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Điện thoại'" placeholder='Điện thoại'  maxlength="12" value="<?php echo $user['Phone']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label for="email">Email</label>
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Email'" placeholder='Email' readonly value="<?php echo $user['Email']?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input class="form-control" name="address" id="address" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Địa chỉ'" placeholder='Địa chỉ' value="<?php echo $user['Address']?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                        <label class="radio inline">
                            <input type="radio" name="gender" value="male" <?php $user["Gender"] != 1  ? print "checked" : null ?>>
                            <span> Male </span>
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="gender" value="female" <?php $user["Gender"] == 1  ? print "checked" : null ?>>
                            <span>Female </span>
                        </label>
                    </div>
              </div>
                    
            </div>
            <div class="form-group mt-3">
              <input type="button" class="btn btn-primary " value="&nbsp;&nbsp;&nbsp;Lưu&nbsp;&nbsp;&nbsp;" onclick="sendProfile();" name="submit"/>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
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
<div class="load" >
	<img src="<?php echo base_url(); ?>/assets/img/loading.gif">
</div>
    <script>
    $(document).ready(() => {
      $('.load').delay(500).fadeOut('fast'); 
    })
    function sendProfile(){
      $('.load').fadeIn('fast');
      var element = document.getElementsByName('gender');
      let username = $('#username').val();
      let email = $('#email').val();
      let phone = $('#phone').val();
      let address = $('#address').val();
      let gender = element[0].checked ? 2 : 1;
      const data = {
        username,email,phone,address,gender
      };
      $.ajax({
            url: '<?php echo base_url();?>/User/updateProfile',
            type : "post",
            dataType:'json',
            data : data,
            success : function(datar) {
                $('.load').fadeOut('fast');
                $('#message-error').html(datar.message);
                $('#messageModal').modal('show');
            },
            error : function(data) {
                // do something
            }
        });

    }
  </script>