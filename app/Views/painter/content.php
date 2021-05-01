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
                                                         <img src="<?php echo base_url(); ?>/assets/img/paint.gif">
                                                     </p>
                                                 </td>
                                                 <td style="width: 90%;">
                                                     <div>
                                                         <h6>
                                                             Giá Yêu cầu : <?php echo floatval($value['PriceofUser']); ?>
                                                             <br>
                                                             Ngày giao : <?php echo $value['DateExpiry'] ?>
                                                         </h6>
                                                     </div>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width: 60%;">
                                    <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $value['idUser'].'/'.$value['Name']; ?>" alt="#">
                                 </td>
                                 <td style="width: 40%;">
                                    <div class="card" style="min-height: 150px;">
                                        <?php if ($value['Confirm_info'] !== null && $value['idStatusPicture'] !='4') :?>
                                            <?php for ($i = 0; $i < count($value['Confirm_info']); $i++): ?>
                                                <h6>
                                                    Giá Vẽ <?php echo $i + 1;?>: <?php echo $value['Confirm_info'][$i]['idPainter'].'_'.$value['Confirm_info'][$i]['DateExpiry'].'_'.floatval($value['Confirm_info'][$i]['Price']);?>
                                                    <br>
                                                </h6>
                                            <?php endfor ?>
                                        <?php else : ?>
                                            <h4 style="color: #3e75af;">
                                                Hình đang được vẽ Chibipro
                                            </h4>
                                        <?php endif; ?>
                                    </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <table class="table">
                                         <body>
                                             <tr>
                                                <?php
                                                    if(isset($_SESSION['Permission']) && ($_SESSION['Permission'] == '2'))
                                                    {
                                                        if($value['idStatusPicture'] =='4'){
                                                            if($value['MyPaint']){
                                                                echo " <td style='width: 20%;'>
                                                                <input id='".$value['idPictures']."_upchibi' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/up_chibi.png' title='Up Hình Chibi lên' onmouseover='iconHover(this.id)' onmouseout='iconUnhover(this.id)'>
                                                                </td>";
                                                            }
                                                        }else{
                                                            echo " <td style='width: 20%;'>
                                                            <input id='".$value['idPictures']."_check' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/check-in.png' title='Báo giá vẽ' onmouseover='iconHover(this.id)' onmouseout='iconUnhover(this.id)'>
                                                            </td>";
                                                        }
                                                    }
                                                    if(isset($_SESSION['email']) && ($_SESSION['email'] == $value['Email']))
                                                    {
                                                        echo " <td style='width: 20%;'>
                                                                <input id='".$value['idPictures']."_edit' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/edit.png' title='Chỉnh sửa' onmouseover='iconHover(this.id)' onmouseout='iconUnhover(this.id)'>
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
                 var NWin = window.open($(this).prop('http://www.facebook.com/sharer/sharer.php?'), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
                if (window.focus)
                {
                NWin.focus();
                }
                return false;
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
            case 'upchibi':
                 if (log_in == 1) {
                    <?php if($_SESSION['Permission'] == 2) {?>
                     window.location.href = "<?php echo base_url(); ?>/Painter/Painter/Chibi?id=" + id[0] + "";
                    <?php } else {?>
                    window.alert("You aren't a painter");
                    <?php } ?>
                 } else {
                     window.location.assign("<?php echo base_url(); ?>/Users/Login")
                 }
                 break;
             default:
                 // code block
         }
     };
     function iconHover(data) {
        var iconImg = getImgHover(data);
        $('#'+data).attr('src', '<?php echo base_url(); ?>/assets/img/'+iconImg);
    }
    function iconUnhover(data) {
        var iconImg = getImgUnhover(data);
        $('#'+data).attr('src', '<?php echo base_url(); ?>/assets/img/'+iconImg);
    }
 </script>