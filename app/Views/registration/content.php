<?php
$fullname = [0 => '', 1 => ''];
if (!empty($user['Name'])) {
    $fullname = explode('*-*-', $user['Name']);
}

?>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="<?php echo base_url(); ?>/assets/img/logo_registration.png" alt="" />
            <h3>Welcome</h3>
            <form method="POST" action="/Users/Login">
                <input type="submit" class="btnLogin" name="" value="Login" /><br />
            </form>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active register-right" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form id="formRegistration" method="post">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="firstName" maxlength="20" name="firstName" placeholder="First Name *" value="<?php echo $fullname[0] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="lastName" maxlength="20" name="lastName" placeholder="Last Name *" value="<?php echo $fullname[1] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" required id="pass" name="password" placeholder="Password *" value="<?php echo $user['Password'] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirmPass" required name="confirmPassword" placeholder="Confirm Password *" value="<?php echo $user['Password'] ?>" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" <?php $user["Gender"] != 1  ? print "checked" : null ?>>
                                            <span style="padding-right:20px;"> Male </span>
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
                                    if (!isset($user['Email']))
                                        echo  "<input id = 'Email' type='email' class='form-control' required name='email' placeholder='Your Email *' value= '' />";
                                    else
                                        echo  "<input id = 'Email' type='email' class='form-control' required name='email' placeholder='Your Email *' value= '" . $user["Email"] . "' readonly />";
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="txtEmpPhone" onkeyup="this.value=this.value.replace(/[^\d]/,'')" minlength="10" maxlength="15" name="txtEmpPhone" class="form-control" placeholder="Your Phone " value="<?php echo !isset($user['Phone']) ? '' : $user['Phone'] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="200" id="txtAddress" name="txtAddress" class="form-control" placeholder="Your Address " value="<?php echo !isset($user['Address']) ? '' : $user['Address'] ?>" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="user" value="user" <?php $user["Permission"] != 1  ? print "checked" : null ?>>
                                            <span style="padding-right:20px;"> User </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="user" value="painter" <?php $user["Permission"] == 1  ? print "checked" : null ?>>
                                            <span>Painter </span>
                                        </label>
                                    </div>
                                </div>
                                <?php if (!isset($user['Email'])) { ?>
                                    <input onclick="clickRegistration()" id="btn_Register" type="button" class="btnRegister" value="Đăng ký" name="btnSubmit" />
                                <?php } else { ?>
                                    <input onclick="clickRegistration()" id="btn_Register" type="button" class="btnRegister" value="Lưu lại" name="btnSubmit" />
                                <?php } ?>
                            </div>
                        </div>
                    </form>
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
        $('.load').fadeOut('fast');
        $('#confirmPass').focusout(function() {
            var valuePassword = document.getElementById("pass").value;
            var valueConfirmPassword = document.getElementById("confirmPass").value;
            if (valuePassword !== valueConfirmPassword) {
                window.alert("The two passwords not match");
            }
        });
        $('#Email').focusout(function() {
            <?php if (!isset($user['Email'])) { ?>
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
            <?php } ?>
        });

    });

    function clickRegistration() {
        var form = document.getElementById("formRegistration");
        var elements = form.elements;
        $data = {};
        for (var i = 0, len = elements.length; i < len; ++i) {
            if(elements[i].validationMessage != "")
            {
                window.alert(elements[i].validationMessage);
                document.getElementById(elements[i].id).focus();
                return;
            }
            if( elements[i].name === 'btnSubmit') {
                elements[i].disabled = true;
            } else {
                elements[i].readOnly = true;
            }
            if ((elements[i].name === 'gender' || elements[i].name === 'user')) {
                if (elements[i].checked)($data[elements[i].name] = elements[i].value);
            } else {
                $data[elements[i].name] = elements[i].value;
            }
        }
        $('.load').fadeIn('fast');
        $.ajax({
            url: '<?php echo base_url(); ?>/Users/registration/InSertUser',
            type: "POST",
            data: JSON.stringify($data),
            contentType: false,
            processData: false,
            success: function(data) {
                let response = JSON.parse(data);
                if (!response.status) {
                    $('.load').fadeOut('fast');
                    window.alert(response.message);
                    for (var i = 0, len = elements.length - 1; i < len; ++i) {
                        elements[i].readOnly = false;
                        if ((elements[i].name === 'gender' || elements[i].name === 'user')) {
                            elements[i].value = elements[i].defaultValue;
                            elements[i].checked =  elements[i].defaultChecked;
                        } else {
                            elements[i].value = "";
                        }
                    }
                    document.getElementById('btn_Register').disabled = false;
                } else {
                    window.location.assign("<?php echo base_url(); ?>");
                }
            }
        });
    };
</script>