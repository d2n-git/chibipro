<style>
.choosedfilter {
    display:block;
    overflow:hidden;
    background:#fff;
    margin:-10px 0 10px 0;
    clear:both
}
.choosedfilter a{
    display:inline-block;
    vertical-align:text-bottom;
    padding:6px;
    background:#288ad6;
    font-size:12px;
    color:#fff;
    border-radius:4px;
    margin-right:5px
}
.bdge {
    height: 21px;
    background-color: orange;
    color: #fff;
    font-size: 11px;
    padding: 8px;
    border-radius: 4px;
    line-height: 3px
}

.comments {
    text-decoration: underline;
    text-underline-position: under;
    cursor: pointer
}
.dot {
    height: 7px;
    width: 7px;
    margin-top: 3px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block
}
.hit-voting:hover {
    color: blue
}
.hit-voting {
    cursor: pointer
}

</style>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>


<!-- Your share button code -->

<section class="feature_part pt-4">
    <?php if($show_flg == 'News') :?>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <div class="choosedfilter">
                    <a href="#" onclick="RemoveFilter(this)">Filter para1 <i class="ti-close"></i></a>
                    <a href="#" onclick="RemoveFilter(this)">Filter para2 <i class="ti-close"></i></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
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
                                    <h2 style="color: #17544c;"><?php echo $value['Title']; ?></h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="width: 10%;">
                                                    <p class="iconTitle">
                                                    <img src="<?php echo base_url(); if($value['idStatusPicture'] == '8'){echo '/assets/img/title.png';}else{echo '/assets/img/title_private.jpg';}?>">
                                                    </p>
                                                </td>
                                                <td style="width: 90%;">
                                                    <div>
                                                        <?php if($show_flg == 'News') :?>
                                                        <h6>
                                                            Chủ nhân : <?php echo str_replace("*-*-"," ",$value['userName']); ?>
                                                            <br>
                                                            Update : <?php echo $value['DateUp']; ?>
                                                        </h6>
                                                    <?php else: ?>
                                                        <h6>
                                                            Báo giá vẽ : <?php if($value['price'] == 0){echo 'Đang cập nhật';}else{echo floatval($value['price']);}?>
                                                            <br>
                                                            Update : <?php echo $value['DateUp']; ?>
                                                        </h6>
                                                    <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 70%;">
                                    <img src="<?php echo base_url(); ?>/assets/img/<?php if($value['idStatusPicture'] >= 8){echo 'upload/'.$value['idUser'].'/'.$value['chibiFileName'];}else{echo $value['chibiFileName'];} ?>" alt="#">
                                </td>
                                <td style="width: 30%;">
                                    <img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $value['idUser'].'/'.$value['Name']; ?>" alt="#">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="table">
                                        <body>
                                            <tr>
                                            <?php if($show_flg == 'News') :?>
                                                <td style="width: 20%;">
                                                    <input id="<?php echo $value['idPictures'] ?>_like" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/like.png" title="Thích" onmouseover="iconHover(this.id)" onmouseout="iconUnhover(this.id)">
                                                    <span class="iconFooterNumber" id="<?php echo $value['idPictures'] ?>_Numberlike"><?php echo $value['NumberLike'] ?></span>
                                                </td>
                                                <td style="width: 20%;">
                                                    <input id="<?php echo $value['idPictures'] ?>_comment" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/comment.png" title="Comment" onmouseover="iconHover(this.id)" onmouseout="iconUnhover(this.id)">
                                                    <span class="iconFooterNumber">5</span>
                                                </td>
                                                <td style="width: 20%;">
                                                    <!-- <div class="fb-share-button" data-href="http://chibipro.top/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fchibipro.top%2F&amp&&description=Chibiprocc;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> -->
                                                    <input id="<?php echo $value['idPictures'] ?>_return" onclick="onclickMe(this.id)" class="iconFooter" type="image" src="<?php echo base_url(); ?>/assets/img/return.png" title="Chia sẽ" onmouseover="iconHover(this.id)" onmouseout="iconUnhover(this.id)">
                                                </td>
                                            <?php endif; ?>
                                            <?php
                                                if(isset($_SESSION['email']) && ($_SESSION['email'] == $value['Email'])){
                                                    if($show_flg == 'News' || ($show_flg == 'MyChibi' && ($value['idStatusPicture'] == '8' || $value['idStatusPicture'] == '9'))){
                                                        echo " <td style='width: 20%;'>
                                                                <input id='".$value['idPictures']."_setting' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/setting.png' title='Setting' onmouseover='iconHover(this.id)' onmouseout='iconUnhover(this.id)'>
                                                                </td>";
                                                    }else{
                                                        echo " <td style='width: 20%;'>
                                                                <input id='".$value['idPictures']."_edit' onclick='onclickMe(this.id)' class='iconFooter' type='image' src='".base_url()."/assets/img/edit.png' title='Chỉnh sửa' onmouseover='iconHover(this.id)' onmouseout='iconUnhover(this.id)'>
                                                                </td>";
                                                    }
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
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="d-flex justify-content-center row">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row align-items-center text-left comment-top border-bottom px-4" style="background-color: #f1f1f1; padding-top: 5px;padding-bottom: 5px;">
                        <div class="profile-image"><img class="rounded-circle" src="<?php echo base_url(); ?>/assets/img/<?php if($value['idStatusPicture'] >= 8){echo 'upload/'.$value['idUser'].'/'.$value['chibiFileName'];}else{echo $value['chibiFileName'];} ?>" width="70" id="image_comment" onerror="this.src='<?php echo base_url(); ?>/assets/img/noimage.png'"></div>
                        <div class="d-flex flex-column ml-3">
                            <div class="d-flex flex-row post-title">
                                <h5 id="title_comment">Title</h5>
                            </div>
                            <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="bdge mr-1">Cbp</span><span class="mr-2 comments" id="total_comment">13 comments&nbsp;</span></div>
                        </div>
                    </div>
                    <div class="coment-bottom bg-white px-4">
                        <input type="hidden" id="idPicture">
                        <div class="d-flex flex-row add-comment-section mt-4 mb-4"><img class="img-fluid img-responsive rounded-circle mr-2" src="<?php echo base_url(); ?>/assets/img/user_avatar/00/avatar.png?>" width="38"><input type="text" class="form-control mr-3" placeholder="Add comment" id="comment_text"><button class="btn btn-primary" type="button" onclick="comment()" >Comment</button></div>
                        <div id="content-comment" style="max-height: 500px !important; overflow-y: auto;">
                            <div class="commented-section mt-2" style="min-width: 800px !important;">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="mr-2">Corey oates</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">4 hours ago</span>
                                </div>
                                <div class="comment-text-sm"><span>add text</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="load" >
    <img src="<?php echo base_url(); ?>/assets/img/loading.gif">
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f1f1f1;">
        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <span id="message-error"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(() => {
    $('.load').delay(1000).fadeOut('fast'); 
})
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
            if (log_in == 1) {
                $('.load').fadeIn('fast');
                $.ajax({
                    url: '<?php echo base_url(); ?>/News/getCommemt',
                    type: "GET",
                    data: {"id" : id[0]},
                    dataType:'json',
                    success: function(data) {
                        $('.load').fadeOut('fast');
                        $('#title_comment').html(data.picture.Title)
                        $('#total_comment').html(data.total + ' comments ')
                        let src = "<?php echo base_url(); ?>/assets/img/";
                        if(data.picture.idStatusPicture >= 8){
                            src = src + "upload/" + data.picture.idUser + "\/" + data.picture.chibiFileName;
                        }else{
                            src = src + data.picture.chibiFileName;
                        }
                        $("#image_comment").attr("src",src);
                        $('#idPicture').val(data.picture.idPictures);
                        $("#content-comment").html('');
                        data.comments.forEach(element => {
                            $("#content-comment").append(`
                            <div class="commented-section mt-2" style="min-width: 500px !important;">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="mr-2">${element.Name}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">${element.created}</span>
                                </div>
                                <div class="comment-text-sm"><span>${element.comment}</span></div>
                            </div>
                            <div class="reply-section">
                                <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">25</span><span class="dot ml-2"></span>
                                    <h6 class="ml-2 mt-1">Reply</h6>
                                </div>
                            </div>
                            `)
                        });
                        $('#commentModal').modal('show');
                    }
                });
            } else {
                window.location.assign("<?php echo base_url(); ?>/Users/Login")
            }
            break;
        case 'return':
            window.open('https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fchibipro.top%2F&amp&&description=Chibiprocc;src=sdkpreparse','facebook-share-dialog',"width=626, height=436")
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
    case 'setting':
        if (log_in == 1) {
                window.location.assign("<?php echo base_url(); ?>/News/setting?id=" + id[0] + "&type=<?php echo $type;?>");
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

function comment(){
    let idPicture = $('#idPicture').val();
    let text = $('#comment_text').val();
    $('.load').fadeIn('fast');
    $.ajax({
        url: '<?php echo base_url(); ?>/News/postCommemt',
        type: "POST",
        data: {idPicture : idPicture, text},
        dataType:'json',
        success: function(data) {
        $('.load').fadeOut('fast');
            $('#total_comment').html(data.total + ' comments' + '<h5></h5><span class="dot mb-1"></span>')
            $("#content-comment").html('');
            data.comments.forEach(element => {
                $("#content-comment").append(`
                <div class="commented-section mt-2" style="min-width: 500px !important;">
                    <div class="d-flex flex-row align-items-center commented-user">
                        <h5 class="mr-2">${element.Name}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">${element.created}</span>
                    </div>
                    <div class="comment-text-sm"><span>${element.comment}</span></div>
                </div>
                <div class="reply-section">
                    <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">25</span><span class="dot ml-2"></span>
                        <h6 class="ml-2 mt-1">Reply</h6>
                    </div>
                </div>
                `)
            });
            $('#comment_text').val('');
            $('#commentModal').modal('show');
        }
    });
}
</script>