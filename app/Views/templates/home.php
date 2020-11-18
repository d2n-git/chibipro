
<section class="banner_part">
    <div class="container-fluid">
        <!-- <div class="container">
            <div class="row align-items-center" id="form-upload">
                <div class="banner_slider">
                    <div class="single_banner_slider">
                        <div class="banner_text">
                            <h1>Welcome to Chibipro</h1>
                            <a href="#submit" class="genric-btn primary circle">Upload now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>/assets/img/1.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>/assets/img/4.jpg">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>/assets/img/3.jpg">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
    <!-- new arrival part here -->
    <section class="new_arrival padding-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>New</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="new_arrival_iner filter-container">
                        <?php foreach($pictures as $value){
                        ?>
                            <div class="single_arrivel_item col-md-3" style="height:400px;">
                                <img src="<?php echo base_url();?>/assets/img/<?php echo $value['Name'];?>" alt="#">
                                <div class="hover_text">
                                    <a href="#"><h3><?php echo $value['userName']?></h3></a>
                                    <div class="rate_icon">
                                        <a> <i class="fas fa-star"></i> </a>
                                        <a> <i class="fas fa-star"></i> </a>
                                        <a> <i class="fas fa-star"></i> </a>
                                        <a> <i class="fas fa-star"></i> </a>
                                        <a> <i class="fas fa-star"></i> </a>
                                    </div>
                                    <h5>$150</h5>
                                    <div class="social_icon">
                                        <a onclick="likeImage(<?php echo $value['idPictures']?>);"><i class="ti-heart"></i></a>
                                        <a href="<?php echo base_url();?>/detail/index/<?php echo $value['idPictures']?>"><i class="ti-bag"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row justify-content-center">
            <?= $pager->makeLinks($page, LIMITPICTURE, $total, 'template_picture'); ?>
        </div>
        </div>
    </section>


    <!-- new arrival part end -->

<!-- free shipping here -->
<section class="shipping_details section_padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" id="submit">
                <div class="arrival_tittle">
                    <h2>Upload File</h2>
                </div>
            </div>
        </div>
        <Form id="form1" action="<?php echo base_url();?>/Upload/UploadFile/UpImagine"  method="POST" enctype="multipart/form-data" onsubmit="submitUpload(this);">
            <div class="mt-10 col-12 col-md-6">
                <div class="input-images"></div>
            </div>
            <div class=" col-12 col-md-6" style="margin-top: 10px;" hidden id="areaupload">
                    <img id="blah" />
            </div>
            <div class="mt-10 col-12 col-md-6">
                <input id="email" type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input">
            </div>

            <div class="mt-10 col-12 col-md-6">
                <div class="g-recaptcha" data-sitekey="<?php echo DATA_SITEKEY; ?>">
                    <!-- data-type co the thay bang audio -->
                </div>
            </div>
            <div class="mt-10 col-12 col-md-6 align-items-center">
                <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
        </Form>
    </div>
</section>
<!-- free shipping end -->

<!-- Contact-->
<section class="new_arrival section_padding" style="background-color: #f4f4f4;">
    <div class="container">
        <div class="arrival_tittle">
            <h2>Contact</h2>
        </div>
        <div class="row">
        <div class="col-lg-6 ">
            <div class="text-contact">
          <h2>Something's wrong here...</h2>
          <p>We can't find the page you're looking for. Check out our <br> Help Center or head back to home.</p>
          <a href="<?php echo base_url();?>/Contact" class="genric-btn primary">Help</a>
          <a href="<?php echo base_url();?>" class="genric-btn primary-border">Home</a>
          </div>
        </div>
        <div class="col-lg-6">
        <img class="d-block w-100 h-60" src="<?php echo base_url(); ?>/assets/img/contact.jpg" >
        </div>
        </div>
    </div>
</section>
<br>
<!--End Contact-->

<!-- subscribe_area part start-->
<section class="instagram_photo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="instagram_photo_iner">
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/picture/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/picture/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/picture/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/picture/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/picture/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
<!-- Hiệu ứng load -->
<div class="load" >
	<img src="<?php echo base_url(); ?>/assets/img/loading.gif">
</div>
<!--::subscribe_area part end::-->
<script>
    $(document).ready(() => {
        $('.load').delay(1000).fadeOut('fast'); 
        $(function(){
            $('.input-images').imageUploader();
        });

    })

    $('.input-images').imageUploader({
        extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
        mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
        maxSize: undefined,
        maxFiles: undefined,
    });

    $('.input-images').imageUploader({
        imagesInputName: 'images',
        preloadedInputName: 'preloaded',
        label: ''
    });

    var email = '<?php echo (isset( $_SESSION['logged_in']) && $_SESSION['logged_in']) ? $_SESSION['email'] : "" ?>';
    $(document).ready(function() {
        if (email == ""){
            $('#email').prop('readonly', false);
            $('#email').attr('required', true);
        }else{
            $('#email').val(email);
            $('#email').prop('readonly', true);
        }
    });
    function submitUpload(e){
        $('.load').fadeIn('fast');
        event.preventDefault();
        var formData = new FormData(e);
        $.ajax({
            url: '<?php echo base_url();?>/Upload/UploadFile/UpImagine',
            data: formData,
            type: "POST",
            contentType: false,
            processData: false, 
            success : function(data){
                let response = JSON.parse(data);
                $('.load').fadeOut('fast');
                $('#message-error').html(response.message);
                $('#messageModal').modal('show');
                grecaptcha.reset();
                if(response.status == 1){
                    $('#form1').trigger("reset");
                    $('#areaupload').attr('hidden',true);
                    window.location.href = '<?php echo base_url();?>' + '/Upload/UploadFile/detail?id='+ response.id;
                }
            }
        });
        return false;
    }
</script>