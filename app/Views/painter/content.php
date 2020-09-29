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
                                     <h1>
                                         Title : <?php echo $value['Title']; ?>
                                     </h1>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <table class="table">
                                         <tbody>
                                             <tr>
                                                 <td style="width: 10%;">
                                                     <p class="iconTitle">
                                                         <img src="<?php echo base_url(); ?>/assets/img/title.png">
                                                     </p>
                                                 </td>
                                                 <td style="width: 90%;">
                                                     <div>
                                                         <h6>
                                                             Chủ nhân : <?php echo $value['userName']; ?>
                                                             <br>
                                                             Update : <?php echo $value['DateUp']; ?>
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
                                     <img src="<?php echo base_url(); ?>/assets/img/<?php echo $value['Name']; ?>" alt="#">
                                 </td>
                                 <td style="width: 30%;">
                                     <img src="<?php echo base_url(); ?>/assets/img/<?php echo $value['Name']; ?>" alt="#">
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <table class="table">

                                         <body>
                                             <tr>
                                                 <td style="width: 20%;">
                                                     <input id="<?php echo $value['idPictures'] ?>_like" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/like.png">
                                                     <span class="iconFooterNumber" id="<?php echo $value['idPictures'] ?>_Numberlike"><?php echo $value['NumberLike'] ?></span>
                                                 </td>
                                                 <td style="width: 20%;">
                                                     <input id="<?php echo $value['idPictures'] ?>_comment" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/comment.png">
                                                     <span class="iconFooterNumber">5</span>
                                                 </td>
                                                 <td style="width: 20%;">
                                                     <input id="<?php echo $value['idPictures'] ?>_return" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/return.png">
                                                 </td>
                                                 <?php
                                                 $session = \Config\Services::session();
                                                 if($_SESSION['Permission'] == 1)
                                                 {
                                                  echo " <td style='width: 20%;'>
                                                         <input id='".$value['idPictures']."_check' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/check-in.png'>
                                                         </td>";
                                                 }
                                                 if($_SESSION['logged_in'])
                                                 {
                                                     echo " <td style='width: 20%;'>
                                                             <input id='".$value['idPictures']."_edit' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/edit.png'>
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
         switch (id[1]) {
             case 'like':
                 $.ajax({
                     url: '<?php echo base_url(); ?>/Upload/UploadFile/LikeImagine',
                     type: "POST",
                     data:id[0],
                     contentType: false,
                     processData: false,
                     success: function(data) 
                     {
                        let response = JSON.parse(data);
                        if(response.message == 'success')
                        {
                            document.getElementById(response.response.idPictures +'_Numberlike').innerText = response.response.NumberLike;
                        } 
                     }
                 });
                 break;
             case 'comment':
                 // code block
                 break;
             case 'return':
                 // code block
                 break;
             case 'check':
                 window.location.href = "confirm?id=" + id[0] + "";
                 break;
             case 'edit':
                window.location.assign("/Users/registration?id=" + id[0] + "")
                 break;
             default:
                 // code block
         }
     };
 </script>