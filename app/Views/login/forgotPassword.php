<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">  
    </div>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">
                            <form method="post" id="form1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="email" name="email" placeholder="email address" class="form-control" type="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="btn-submit" name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="button">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hiệu ứng load -->
<div class="load" >
	<img src="<?php echo base_url(); ?>/assets/img/loading.gif">
</div>
<script>
    $(document).ready(function() {
        $('.load').delay(10).fadeOut('fast');
        $('#btn-submit').click(function() {
            var form = document.getElementById("form1");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                if(elements[i].validationMessage != "")
                {
                window.alert(elements[i].validationMessage);
                document.getElementById(elements[i].id).focus();
                return;
                }
            }
            $('.load').delay(10).fadeIn('fast');
            $.ajax({
                url: '<?php echo base_url();?>/Users/forgotPassword/resetPassWord',
                type: "POST",
                data: document.getElementById('email').value,
                contentType: false,
                processData: false,
                success: function(data) {
                    let response = JSON.parse(data);
                    $('.load').delay(10).fadeOut('fast'); 
                    if (response.status) {
                        window.alert(response.message);
                        window.location.assign("<?php echo base_url(); ?>")
                    } else {
                        window.alert(response.message); 
                        document.getElementById('email').value = "";
                    }
                }
            });
        });
    });
</script>