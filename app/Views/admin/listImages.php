<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/Admin/Listimages" class="nav-link">Upload List</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/Admin/Listusers" class="nav-link">User List</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/Admin/Admin/ListContact" class="nav-link">Contact List</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Summary</a>
    </li>
</ul>
<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
            <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
            </h3>
            <p class="text-sm">Call me whenever you can...</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
        </div>
        <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
            <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
            </h3>
            <p class="text-sm">I got your message bro</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
        </div>
        <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
            <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
            </h3>
            <p class="text-sm">The subject goes here</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
        </div>
        <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i> 4 new messages
        <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
        <i class="fas fa-users mr-2"></i> 8 friend requests
        <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
        <i class="fas fa-file mr-2"></i> 3 new reports
        <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
    </a>
    </li>
</ul>
</nav>
<!-- /.navbar -->
 <!--================Addmin layout Area =================-->
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Picture List</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <form action="/Admin/Listimages" method="POST">
                        <div class="row">
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="username">Username</label>
                                <div class="input-group">
                                    <div class=""><i class="fa fa-user fa-fw"></i></div>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="email">Email</label>
                                <div class="input-group">
                                    <div class=""><i class="fa fa-envelope fa-fw"></i></div>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-search fa-fw"></i>Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-lg-12">
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead style="background-color:#d0f3fb;">
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <input type="checkbox" id="select_all" />
                                            </th>
                                            <th>UserID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>PictureID</th>
                                            <th>PictureName</th>
                                            <th>PictureUp</th>
                                            <th>Chibipro</th>
                                            <th>Title</th>
                                            <th>DateUp</th>
                                            <th>NumberLike</th>
                                            <th>Status</th>
                                            <th>StandarPrice</th>
                                            <th>PriceOfUser</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pictures as $iKey => $data): ?>
                                            <tr>
                                                <th scope="row" class="sz-col-50 text-center"><?php echo $iKey?></th>
                                                <td> <input type="checkbox"/></td>
                                                <td id="idUser" class="text-info"><?php echo $data['idUser']?></td>
                                                <td><?php echo $data['UserName']?></td>
                                                <td><?php echo $data['Email']?></td>
                                                <td id="idPictures"><?php echo $data['idPictures']?></td>
                                                <td style="max-width:300px; word-wrap:break-word;"><?php echo $data['PicturesName']?></td>
                                                <td><img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $data['idUser'].'/'.$data['PicturesName']; ?>" alt="" border=3 height=100 width=100/></td>
                                                <td><img src="<?php echo base_url(); ?>/assets/img/upload/<?php echo $data['idUser'].'/'.$data['chibiFileName']; ?>" alt="" border=3 height=100 width=100/></td>
                                                <td><?php echo $data['Title']?></td>
                                                <td><?php echo $data['DateUp']?></td>
                                                <td><?php echo $data['NumberLike']?></td>
                                                <td><?php echo $data['Status']?></td>
                                                <td><?php echo $data['StandarPrice']?></td>
                                                <td><?php echo $data['PriceOfUser']?></td>
                                                <td class="text-center">
                                                <button class="btn btn-sm btn-outline-info border-0" data-idPictures="<?php echo $data['idPictures']?>" type="button" value="submit" onclick="onclickEdit(this);"
                                                        title="Edit"><i class="fa fa-edit fa-fw"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-warning border-0" data-status="2" type="button" value="submit" onclick="ChangeStatus(this);"
                                                        title="Lock"><i class="fa fa-lock fa-fw"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger border-0" data-status="1" type="button" value="submit" onclick="ChangeStatus(this);"
                                                        title="Delete"><i class="fa fa-trash fa-fw"></i>
                                                </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <ul class="pagination pull-right">
                                <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a>
                                </li>
                                <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">3</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">4</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">5</a>
                                </li>
                                <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">6</a>
                                </li>
                                <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <script>
    function ChangeStatus($_this){
        var $row = $($_this).closest("tr");
        let idUser = $($row).find('#idUser').text();
        let idPictures = $($row).find('#idPictures').text();
        let Status = $($_this).attr('data-status');
        const data = {
            idUser, idPictures, Status
        };
        $.ajax({
                url: '<?php echo base_url();?>/Admin/Listimages/updateStatusPictureAdmin',
                type : "post",
                dataType:'json',
                data : data,
                success : function(data) {
                    alert(data.message);
                    location.reload();
                },
                error : function(data) {
                    // do something
                }
            });
    }
    function onclickEdit($_this) {
        let idPictures = $($_this).attr('data-idPictures');
        var log_in = "<?php echo (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) ? 1 : 0 ?>";
        if (log_in == 1) {
            window.location.assign("<?php echo base_url(); ?>/Admin/Listimages/detailAdmin?id=" + idPictures + "");
        } else {
            window.location.assign("<?php echo base_url(); ?>/Users/Login")
        }
    };
  </script>