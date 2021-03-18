  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Contact</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
  <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"></div>
        <script>
          function initMap() {
            var uluru = {
              lat: -25.363,
              lng: 131.044
            };
            var grayStyles = [{
                featureType: "all",
                stylers: [{
                    saturation: -90
                  },
                  {
                    lightness: 50
                  }
                ]
              },
              {
                elementType: 'labels.text.fill',
                stylers: [{
                  color: '#ccdee9'
                }]
              }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                lat: -31.197,
                lng: 150.744
              },
              zoom: 9,
              styles: grayStyles,
              scrollwheel: false
            });
          }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
        </script>

      </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="form1">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                <label for="exampleInputEmail1">Nội dung</label>
                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="5" maxlength="450"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập Nội dung'"
                    placeholder='Nhập Nội dung'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label for="exampleInputEmail1">Điện thoại</label>
                  <input class="form-control single-input" name="phone" id="phone" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Điện thoại'" placeholder='Điện thoại' maxlength="12">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Email'" placeholder='Email' maxlength="50">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                <label for="exampleInputEmail1">Họ tên</label>
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Họ tên'" placeholder='Họ tên' maxlength="120">
                </div>
              </div>
              <div class="col-12">
              <div class="form-group">
              <label for="exampleInputEmail1">Về vấn đề</label>
              <br/>
                    <div class="form-check-inline border border-light rounded area-radio">
                    <label class="form-check-label mar-5">
                        <input type="radio" class="form-check-input" name="problem" value="1">Đăng ảnh
                    </label>
                    </div>

                    <div class="form-check-inline border border-light rounded area-radio">
                    <label class="form-check-label mar-5">
                        <input type="radio" class="form-check-input" name="problem" value="2">Thanh toán
                    </label>
                    </div>

                    <div class="form-check-inline border border-light rounded area-radio">
                    <label class="form-check-label mar-5">
                        <input type="radio" class="form-check-input" name="problem" value="3">Tài khoản
                    </label>
                    </div>

                    <div class="form-check-inline border border-light rounded area-radio">
                    <label class="form-check-label mar-5">
                        <input type="radio" class="form-check-input" name="problem" value="4" checked>Khác
                    </label>
                    </div>
              </div>
            </div>

            </div>
            <div class="form-group mt-3">
              <input type="button" class="btn btn-primary " value="&nbsp;&nbsp;&nbsp;Gửi&nbsp;&nbsp;&nbsp;" onclick="sendContact();"/>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
        <img class="d-block w-100 h-60" src="<?php echo base_url(); ?>/assets/img/contact.jpg" style="margin-top: 50px;">
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

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

  <script>
    $(document).ready(() => {
      //Set info nếu đang Login
      var email = '<?php echo (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) ? $_SESSION['email'] : "" ?>';
      if (email == ""){
          $('#email').prop('readonly', false);
          $('#email').val('');
          $('#name').val('');
          $('#phone').val('');
      }else{
          $('#email').val(email);
          $('#email').prop('readonly', true);
          $('#name').val('<?php echo $_SESSION['Name'] ?>');
          $('#phone').val('<?php echo $_SESSION['Phone'] ?>');
      }
    })
    function sendContact(){
      let name = $('#name').val();
      let email = $('#email').val();
      let phone = $('#phone').val();
      let message = $('#message').val();
      let problem = $("input[name='problem']:checked").val();
      const data = {
        problem ,name,email,phone,message
      };
      $.ajax({
            url: '<?php echo base_url();?>/Contact/submitContact',
            type : "post",
            dataType:'json',
            data : data,
            success : function(datar) {
                $('#message-error').html(datar.message);
                $('#messageModal').modal('show');
                if(datar.status == 1){
                    $('#form1').trigger("reset");
                }
                window.location.href = '<?php echo base_url();?>';
            },
            error : function(data) {
                // do something
            }
        });

    }
  </script>