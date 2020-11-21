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
        <div class="col-lg-5">
          <div class="product_slider_img">
          <div id="overlay"></div>
            <div id="vertical">
              <div data-thumb="<?php echo base_url();?>/assets/img/<?php echo $pictures->Name?>">
                <img src="<?php echo base_url();?>/assets/img/<?php echo  $pictures->Name?>" data-action="zoom">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3><?php echo $pictures->Title?></h3>
            <h2>$<?php echo $pictures->MaxPrice?></h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Artist : </span><?php echo str_replace("*-*-"," ",$pictures->userName)?></a>
              </li>
            </ul>
            <p>
                Something for Image
            </p>
            <div class="card_area">
              <div class="add_to_cart">
                  <a href="#" class="btn_3">BOOK</a>
                  <a href="#" class="like_us" onclick="likeImage(<?php echo $pictures->idPictures?>);"> <i class="ti-heart"></i> </a>
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

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
           Something for Painter and Image
          </p>
        </div>
        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6">
                  <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                  </div>
                </div>
                <div class="col-6">
                  
                </div>
              </div>
              <div class="review_list">
                <?php foreach($reviews as $value){?>
                  <div class="review_item">
                  <div class="media">
                    <!-- <div class="d-flex">
                      <img src="img/product/single-product/review-1.png" alt="" />
                    </div> -->
                    <div class="media-body">
                      <h4><?php echo $value['fullname']?></h4>
                      <?php for($i=0;$i<$value['rate'];$i++){?>
                        <i class="fa fa-star"></i>
                      <?php } ?>
                    </div>
                  </div>
                  <p>
                    <?php echo $value['content']?>
                  </p>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <p>Your Rating:</p>
                <span id="rateMe1"></span>
                <p>Outstanding</p>
                <form class="row contact_form" action="contact_process.php" method="post" novalidate="novalidate" id="form-review">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" id="review-content" name="message" rows="1" placeholder="Review"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="button" value="submit" class="btn_3" onclick="sendReview(<?php echo $pictures->idPictures?>);">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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