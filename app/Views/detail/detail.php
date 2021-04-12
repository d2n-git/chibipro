<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <p>Detail product</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <div class="product_slider_img">
        <div id="overlay"></div>
          <div id="vertical">
            <div data-thumb="<?php echo base_url();?>/assets/img/upload/<?php echo $pictures->idUser.'/'.$pictures->chibiFileName?>">
              <img src="<?php echo base_url();?>/assets/img/upload/<?php echo $pictures->idUser.'/'.$pictures->chibiFileName?>" data-action="zoom">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1">
        <div class="s_product_text">
          <h3><?php echo $pictures->Title?></h3>
          <h2>150 CBs<?php echo $pictures->MaxPrice?></h2>
          <p>
              Something for Image
          </p>
          <div class="card_area">
            <div class="add_to_cart">
                <a href="#" class="btn_3">ADD TO FAVORITE</a>
                <a href="#" class="like_us" onclick="heartImage(<?php echo $pictures->idPictures?>);"> <i class="ti-heart"></i> </a>
            </div>
            <div class="social_icon">
                <a href="#" class="fb"><i class="ti-facebook"></i></a>
                <a href="#" class="tw"><i class="ti-twitter-alt"></i></a>
                <a href="#" class="li"><i class="ti-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--================End Single Product Area =================-->
  <script>
    function sendReview(idPicture){
      let rate = $('#rateMe1').find('.amber-text');
      let name = $('#name').val();
      let email = $('#email').val();
      let number = $('#number').val();
      let review = $('#review-content').val();
      const data = {
        idPicture,rate : rate.length,name,email,number,review
      };
      $.ajax({
            url: '<?php echo base_url();?>/Detail/review',
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