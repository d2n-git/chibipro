 <!-- feature_part start-->
 <section class="feature_part pt-4">
     <div class="container-fluid p-lg-0 overflow-hidden">
         <?php foreach ($pictures as $value) { ?>
             <div class="row align-items-center justify-content-between">
                 <div class="col-lg-2 col-sm-2">
                 </div>
                 <div class="col-lg-8 col-sm-8">
                     <table class="table">
                         <tbody>
                             <tr>
                                 <td>
                                     <table class="table">
                                         <tbody>
                                             <tr>
                                                 <td style="width: 10%;">
                                                     <p class="iconTitle">
                                                         <img src="<?php echo base_url(); ?>/assets/img/paint.jpg">
                                                     </p>
                                                 </td>
                                                 <td style="width: 90%;">
                                                     <div>
                                                         <h6>
                                                             Giá Yêu cầu : 200K 
                                                             <br>
                                                             Ngày giao : <?php echo $value['DateUp']; ?>
                                                         </h6>
                                                     </div>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width: 70%;">
                                    <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $value['idUser'].'/'.$value['Name']; ?>" alt="#">
                                 </td>
                                 <td style="width: 30%;">
                                    <div class="card">
                                        <h6>
                                            Giá Vẽ 1 : 220K 
                                            <br>
                                            Ngày giao : <?php echo $value['DateUp']; ?>
                                        </h6>
                                        <h6>
                                            Giá Vẽ 2 : 210K 
                                            <br>
                                            Ngày giao : <?php echo $value['DateUp']; ?>
                                        </h6>
                                        <h6>
                                            Giá Vẽ 3 : 200K 
                                            <br>
                                            Ngày giao : <?php echo $value['DateUp']; ?>
                                        </h6>
                                    </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <table class="table">
                                         <body>
                                             <tr>
                                                <td style="width: 20%;">
                                                    <input id="<?php echo $value['idPictures'] ?>_like" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/like.png" title="Thích">
                                                    <span class="iconFooterNumber" id="<?php echo $value['idPictures'] ?>_Numberlike"><?php echo $value['NumberLike'] ?></span>
                                                </td>
                                                <td style="width: 20%;">
                                                    <input id="<?php echo $value['idPictures'] ?>_comment" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/comment.png" title="Comment">
                                                    <span class="iconFooterNumber">5</span>
                                                </td>
                                                <td style="width: 20%;">
                                                    <input id="<?php echo $value['idPictures'] ?>_return" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/return.png" title="Chia sẽ">
                                                </td>
                                                <?php
                                                    if(isset($_SESSION['Permission']) && ($_SESSION['Permission'] == '2'))
                                                    {
                                                        echo " <td style='width: 20%;'>
                                                                <input id='".$value['idPictures']."_check' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/check-in.png' title='Báo giá vẽ'>
                                                                </td>";
                                                    }
                                                    if(isset($_SESSION['email']) && ($_SESSION['email'] == $value['Email']))
                                                    {
                                                        echo " <td style='width: 20%;'>
                                                                <input id='".$value['idPictures']."_edit' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/edit.png' title='Chỉnh sửa'>
                                                                </td>";
                                                    }
                                                ?>
                                             </tr>
                                         </body>
                                     </table>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                 <div class="col-lg-2 col-sm-2">
                 </div>
             </div>
         <?php } ?>
     </div>
 </section>
 <script>
     function onclickMe($data) {
         var id = $data.split('_');
         var log_in = "<?php echo (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) ? 1 : 0 ?>";
         switch (id[1]) {
             case 'like':
                 if (log_in == 1) {
                     $.ajax({
                         url: '<?php echo base_url(); ?>/Upload/UploadFile/LikeImagine',
                         type: "POST",
                         data: id[0],
                         contentType: false,
                         processData: false,
                         success: function(data) {
                             let response = JSON.parse(data);
                             if (response.message == 'success') {
                                 document.getElementById(response.response.idPictures + '_Numberlike').innerText = response.response.NumberLike;
                             }
                         }
                     });
                 } else {
                     window.location.assign("<?php echo base_url(); ?>/Users/Login")
                 }
                 break;
             case 'comment':
                 // code block
                 break;
             case 'return':
                 // code block
                 break;
             case 'check':
                 if (log_in == 1) {
                    <?php if($_SESSION['Permission'] == 2) {?>
                     window.location.href = "<?php echo base_url(); ?>/Painter/Confirm?id=" + id[0] + "";
                    <?php } else {?>
                    window.alert("You aren't a painter");
                    <?php } ?>
                 } else {
                     window.location.assign("<?php echo base_url(); ?>/Users/Login")
                 }
                 break;
             case 'edit':
                 if (log_in == 1) {
                     window.location.assign("<?php echo base_url(); ?>/Upload/UploadFile/detail?id=" + id[0] + "");
                 } else {
                     window.location.assign("<?php echo base_url(); ?>/Users/Login")
                 }
                 break;
             default:
                 // code block
         }
     };
 </script>