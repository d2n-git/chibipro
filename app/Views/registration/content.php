<?php
    $fullname = [0 => '', 1 => ''];
    if (!empty($user['Name'])){
        $fullname = explode('*-*-', $user['Name']);
    }
    
?>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="<?php echo base_url(); ?>/assets/img/logo_registration.png" alt="" />
            <h3>Welcome</h3>
            <form method="POST" action="/Users/Login">
                <input type="submit" name="" value="Login" /><br />
            </form>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>/Users/registration/InSertUser" method="post">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="firstName" maxlength="20" name="firstName" placeholder="First Name *" value="<?php echo $fullname[0] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="firstName" maxlength="20" name="lastName" placeholder="Last Name *" value="<?php echo $fullname[1] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" required id="pass" name="password" placeholder="Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirmPass" required name="confirmPassword" placeholder="Confirm Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    if (empty($user['Email']))
                                        echo  "<input id = 'Email' type='email' class='form-control' required name='email' placeholder='Your Email *' value= '' />";
                                    else
                                        echo  "<input id = 'Email' type='email' class='form-control' required name='email' placeholder='Your Email *' value= '" . $user["Email"] . "' readonly />";
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" minlength="10" maxlength="15" name="txtEmpPhone" class="form-control" placeholder="Your Phone " value="<?php echo empty($user['Phone']) ? '' : $user['Phone'] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="200" name="txtAddress" class="form-control" placeholder="Your Address " value="<?php echo empty($user['Address']) ? '' : $user['Address'] ?>" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="user" value="user" <?php $user["Permission"] != 1  ? print "checked" : null ?>>
                                            <span> User </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="user" value="painter" <?php $user["Permission"] == 1  ? print "checked" : null ?>>
                                            <span>Painter </span>
                                        </label>
                                    </div>
                                </div>
                                <?php
                                if (empty($user['Email']))
                                    echo  " <input id='btn_Register' type='submit' class='btnRegister' value='Register' name='btnSubmit' />";
                                else
                                    echo  " <input id='btn_Register' type='submit' class='btnRegister' value='Modify' name='btnSubmit' />";
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
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
        $('#Email').focusout(function() {
            document.getElementById('btn_Register').disabled = true;
            $.ajax({
                url: '<?php echo base_url(); ?>/Users/registration/CheckEmailValidate',
                type: "POST",
                data: document.getElementById('Email').value,
                contentType: false,
                processData: false,
                success: function(data) {
                    let response = JSON.parse(data);
                    if (!response.status) {
                        window.alert("Email already exist");
                        document.getElementById('Email').value = "";
                        document.getElementById('Email').focus();
                    } else {
                        document.getElementById('btn_Register').disabled = false;
                    }
                }
            });
        });
    });
</script>