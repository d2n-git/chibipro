<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin"  method="POST" onsubmit="return login();">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" id="inputEmail" name="Email" class="form-control" placeholder="Email address" required autofocus >
            <input type="password" id="inputPassword" name="Password" class="form-control" placeholder="Password" required >
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button id="btn-signIn" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->
        <a href="<?php echo base_url();?>/Users/registration" >
        <button  class="btn btn-lg btn-primary btn-block btn-signin" type="button">Registration</button>
        </a>
        <a href="<?php echo base_url();?>/Users/forgotPassword" class="forgot-password">
            Forgot the password?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->
<div class="load" >
	<img src="<?php echo base_url(); ?>/assets/img/loading.gif">
</div>
<script>
    $(document).ready(() => {
        $('.load').fadeOut('fast'); 
    })
    function login() {
        $('.load').fadeIn('fast');
        $data = {'Email' : document.getElementById('inputEmail').value, 'Password' : document.getElementById('inputPassword').value}
            $.ajax({
                url: '<?php echo base_url();?>/Users/Login/login',
                type: "POST",
                data: JSON.stringify($data),
                contentType: false,
                processData: false,
                success: function(data) {
                    $('.load').fadeOut('fast');
                    let response = JSON.parse(data);
                    if (response.status) {
                        window.location.assign("<?php echo base_url(); ?>")
                    } else {
                        window.alert(response.message);
                        document.getElementById('inputPassword').value = "";
                    }
                }
            });
        return false;
    }
</script>