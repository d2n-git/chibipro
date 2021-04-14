<?php
    $fullname = [0 => '', 1 => ''];
    if (!empty($user['Name'])){
        $fullname = explode('*-*-', $user['Name']);
    }
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <h4>Ảnh đại diện</h4>
            <img src="<?php echo base_url(); ?>/assets/img/user_avatar/<?php echo $user['idUser'].'/'.$user['Avata']; ?>" />
        </div>
        <div class="col-lg-9 col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="<?php echo base_url(); ?>/Users/registration/InSertUser" method="post">
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>idUser</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?php echo $user["idUser"] ?></h6>
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>First Name</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" required id="firstName" maxlength="20" name="firstName" placeholder="First Name *" value="<?php echo $fullname[0] ?>" />
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Last Name</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" required id="firstName" maxlength="20" name="lastName" placeholder="Last Name *" value="<?php echo $fullname[1] ?>" />
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Gender</h6>
                            </div>
                            <div class="col-md-6">
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
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Email</h6>
                            </div>
                            <div class="col-md-6">
                                <input type='email' class='form-control' required name='email' placeholder='Your Email *' value= '<?php echo $user['Email']?>' />
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Your Phone</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" minlength="10" maxlength="15" name="txtEmpPhone" class="form-control" placeholder="Your Phone " value="<?php echo empty($user['Phone']) ? '': $user['Phone'] ?>" />
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Address</h6>
                            </div>
                            <div class="col-md-6">
                                <input type="text" maxlength="200" name="txtAddress" class="form-control" placeholder="Your Address " value="<?php echo empty($user['Address']) ? '': $user['Address'] ?>" />
                            </div>
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-3">
                                <h6>Permission</h6>
                            </div>
                            <div class="col-md-6">
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
                        </div>
                        <div class="row register-form margin-10px">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <input id="btn_changePass" type="button" class="btnDelete" value="Change Pass" name="btn_changePass" style="margin-bottom: 10px; margin-right: 20px; width: 140px;" onclick="changePass('0');"/>
                                <input id="btn_confirm" type="submit" class="btnFinish" value="Lưu lại" name="btnSubmit" style="margin-bottom: 10px; width: 140px;"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header" style="background-color: #f1f1f1;">
            <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row register-form margin-10px">
                <div class="col-md-4">
                    <h6>Password</h6>
                </div>
                <div class="col-md-6">
                    <input type="password" class="form-control" required id="pass" name="password" placeholder="Password *" value="" />
                </div>
            </div>
            <div class="row register-form margin-10px">
                <div class="col-md-4">
                    <h6>Confirm Password</h6>
                </div>
                <div class="col-md-6">
                    <input type="password" class="form-control" id="confirmPass" required name="confirmPassword" placeholder="Confirm Password *" value="" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 20px;">Hủy</button>
            <button type="submit" class="btn btn-danger" value="OK" >OK</button>
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
    });
    function changePass(itype){
        $('#changePassModal').modal('show');
        $('#pass').val('');
        $('#confirmPass').val('');
    }
</script>