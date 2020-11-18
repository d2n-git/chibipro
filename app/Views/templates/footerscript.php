    <script src="<?php echo base_url();?>/assets/js/jquery-1.12.1.min.js"></script>
    <!-- popper j<?php echo base_url();?>/assets/s -->
    <script src="<?php echo base_url();?>/assets/js/popper.min.js"></script>
    <!-- bootstra<?php echo base_url();?>/assets/p js -->
    <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
    <!-- easing j<?php echo base_url();?>/assets/s -->
    <script src="<?php echo base_url();?>/assets/js/jquery.magnific-popup.js"></script>
    <!-- swiper j<?php echo base_url();?>/assets/s -->
    <script src="<?php echo base_url();?>/assets/js/swiper.min.js"></script>
    <!-- swiper j<?php echo base_url();?>/assets/s -->
    <script src="<?php echo base_url();?>/assets/js/mixitup.min.js"></script>
    <!-- particle<?php echo base_url();?>/assets/s js -->
    <script src="<?php echo base_url();?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/jquery.nice-select.min.js"></script>
    <!-- slick js<?php echo base_url();?>/assets/ -->
    <script src="<?php echo base_url();?>/assets/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/contact.js"></script>
    <script src="<?php echo base_url();?>/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/mail-script.js"></script>
    <!-- custom js -->
    <script src="<?php echo base_url();?>/assets/js/custom.js"></script>
    <script src="<?php echo base_url();?>/assets/js/zoom.js"></script>
    <script src="<?php echo base_url();?>/assets/js/rating.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/image-uploader.js"></script>
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#areaupload').attr('hidden',false);
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
            }
        }
    $(document).ready(function() {
        $('#rateMe1').mdbRate();
    });

    function likeImage(idPicture){
        let data = {
            idPicture : idPicture
        }
        $.ajax({
            url : "<?php echo base_url(); ?>/Home/likeImage",
            type : "post",
            dataType:'json',
            data : data,
            success : function(data) {
                alert(data.message);
            },
            error : function(data) {
                // do something
        }
    });
    }

    </script>