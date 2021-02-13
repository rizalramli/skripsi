<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Skripsi</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo/logo.png') ?>">


    <?php $this->load->view('layouts/css.php'); ?>

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo base_url('assets/stisla/icons/avatar-1.png') ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi,
                                <?php echo $this->session->userdata('username'); ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item has-icon text-danger" href="" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>

                    </li>
                </ul>
            </nav>

            <?php $this->load->view('layouts/sidebar.php'); ?>


            <!-- Main Content -->
            <div class="main-content">
                <?php echo $contents; ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Skripsi &copy; 2021
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda yakin ingin logout?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?php echo base_url('logout') ?>" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <?php $this->load->view('layouts/js.php'); ?>


</body>

</html>