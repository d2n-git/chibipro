<?php 
    $session = \Config\Services::session();
?>
<header class="main_menu home_menu">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-11">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>/News">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>/Contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>/#submit">ChibiPro +</a>
                            </li>
                            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) :?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url(); ?>/Users/userpage"><?php echo $_SESSION['Name'] ?></a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) :?>
                                <a href="<?php echo base_url(); ?>/Users/registration?id=<?php echo $_SESSION['idUser']; ?>" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-user"></i>
                                </a>
                                <a href="<?php echo base_url(); ?>/Users/Login" style="padding: 2px 0px 0px 5px;">Logout</a>
                            <?php else : ?>
                                <a href="<?php echo base_url(); ?>/Users/Login" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-user"></i>
                                </a>
                                <h6 style="padding: 2px 0px 0px 5px;">Login</h6>
                            <?php endif;?>
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>