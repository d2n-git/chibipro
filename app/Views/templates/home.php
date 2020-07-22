
<section class="banner_part">
    <div class="container-fluid">
        <div class="container">
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
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>/assets/img/banner_img.png">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>/assets/img/banner_img.png">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url(); ?>/assets/img/banner_img.png">
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
                            <div class="single_arrivel_item col-md-3">
                                <img src="<?php echo base_url();?>/assets/img/3.jpg" alt="#">
                                <div class="hover_text">
                                    <p>Canvas</p>
                                    <a href="<?php echo base_url();?>/detail"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                    <div class="rate_icon">
                                        <a href="#"> <i class="fas fa-star"></i> </a>
                                        <a href="#"> <i class="fas fa-star"></i> </a>
                                        <a href="#"> <i class="fas fa-star"></i> </a>
                                        <a href="#"> <i class="fas fa-star"></i> </a>
                                        <a href="#"> <i class="fas fa-star"></i> </a>
                                    </div>
                                    <h5>$150</h5>
                                    <div class="social_icon">
                                        <a href="#"><i class="ti-heart"></i></a>
                                        <a href="#"><i class="ti-bag"></i></a>
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
        <Form id="form1" action="/Upload/UploadFile/UpImagine"  method="POST" enctype="multipart/form-data">
            <div class="mt-10 col-12 col-md-6">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload"
                    aria-describedby="inputGroupFileAddon01" class="single-input" onchange="readURL(this);">
                    <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>

                </div>
            </div>
            <div class=" col-12 col-md-6" style="margin-top: 10px;" hidden id="areaupload">
                    <img id="blah" src="<?php echo base_url();?>/assets/img/addiamge.PNG" />
            </div>
            <div class="mt-10 col-12 col-md-6">
                <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input">
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

<!-- subscribe_area part start-->
<section class="instagram_photo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="instagram_photo_iner">
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                    <div class="single_instgram_photo">
                        <img src="<?php echo base_url(); ?>/assets/img/1.jpg" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->