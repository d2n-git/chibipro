           <div class="container register">
               <div class="row">
                   <div class="col-md-3 register-left">
                       <img src="<?php echo base_url();?>/assets/img/logo_registration.png" alt="" />
                       <h3>Welcome</h3>
                       <form method="POST" action="/Users/Login">
                       <input type="submit" name="" value="Login" /><br />
                       </form>
                   </div>
                   <div class="col-md-9 register-right">
                       <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                               <form action="/Users/registration/InSertUser" method="post">
                                   <div class="row register-form">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <input size="50" type="text" id="firstName" required class="form-control " name="firstName" placeholder="First Name *" value="" />
                                           </div>
                                           <div class="form-group">
                                               <input type="text" class="form-control " required name="lastName" placeholder="Last Name *" value="" />
                                           </div>
                                           <div class="form-group">
                                               <input type="password" id="pass" class="form-control " required name="password" placeholder="Password *" value="" />
                                           </div>
                                           <div class="form-group">
                                               <input type="password" id="confirmPass" onblur="myFunction()" class="form-control " required name="confirmPassword" placeholder="Confirm Password *" value="" />
                                           </div>
                                           <div class="form-group">
                                               <div class="maxl">
                                                   <label class="radio inline">
                                                       <input type="radio" name="gender" value="male" checked>
                                                       <span> Male </span>
                                                   </label>
                                                   <label class="radio inline">
                                                       <input type="radio" name="gender" value="female">
                                                       <span>Female </span>
                                                   </label>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <input type="email" class="form-control" required name="email" placeholder="Your Email *" value="" />
                                           </div>
                                           <div class="form-group">
                                               <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone " value="" />
                                           </div>
                                           <div class="form-group">
                                               <input type="text" minlength="10" maxlength="10" name="txtAddress" class="form-control" placeholder="Your Address " value="" />
                                           </div>
                                           <input type="submit" class="btnRegister" value="Register" name="btnSubmit" />
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <script>
               if (document.readyState !== 'complete') {
                   function myFunction() {
                       var valuePassword = document.getElementById("pass").value;
                       var valueConfirmPassword = document.getElementById("confirmPass").value;
                       if (valuePassword !== valueConfirmPassword) {
                           window.alert("The two passwords not match");
                       }

                   }
               }
           </script>