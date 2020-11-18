 <!--================Addmin layout Area =================-->
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Upload Image</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <form action="#">
                        <div class="row">
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                                    <input type="text" class="form-control" id="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></div>
                                    <input type="text" class="form-control" id="email" placeholder="Email">
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
                                            <th>PicturesID</th>
                                            <th>Pictures Name</th>
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
                                                <td><?php echo $data['PicturesName']?></td>
                                                <td><?php echo $data['Title']?></td>
                                                <td><?php echo $data['DateUp']?></td>
                                                <td><?php echo $data['NumberLike']?></td>
                                                <td><?php echo $data['idStatusPicture']?></td>
                                                <td><?php echo $data['StandarPrice']?></td>
                                                <td><?php echo $data['PriceOfUser']?></td>
                                                <td class="text-center">
                                                <button class="btn btn-sm btn-outline-info border-0" data-idPictures="<?php echo $data['idPictures']?>" data-target="" type="button" value="submit" onclick="onclickEdit(this);"
                                                        data-href="#" title="Edit"><i class="fa fa-edit fa-fw"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-warning border-0" data-status="2" type="button" value="submit" onclick="ChangeStatus(this);"
                                                        data-href="#" title="Lock"><i class="fa fa-lock fa-fw"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger border-0" data-status="1" type="button" value="submit" onclick="ChangeStatus(this);"
                                                        data-href="#" title="Delete"><i class="fa fa-trash fa-fw"></i>
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
                url: '<?php echo base_url();?>/Admin/admin/updateStatusPicturesAdmin',
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
            window.location.assign("<?php echo base_url(); ?>/Admin/admin/detailAdmin?id=" + idPictures + "");
        } else {
            window.location.assign("<?php echo base_url(); ?>/Users/Login")
        }
    };
  </script>