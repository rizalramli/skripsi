<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skripsi</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo/logo.png') ?>">

    <!-- panggil assets CSS -->
    <?php $this->load->view('layouts/css.php'); ?>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand" style="margin-top:80px;margin-bottom:30px !important;">
                        <h5 style="font-style: italic;" class="text-center text-primary mt-4">Lilik Collection</h5>
                            <!-- <img src="<?php echo base_url('assets/logo/logo.png') ?>" alt="logo" width="130" class="shadow-light rounded-circle"> -->
                        </div>
                        <div class="card card-primary">
                            <h5 class="text-center text-primary mt-4">Login</h5>
                            <?php if ($this->session->flashdata('email')) : ?>
                                <div class="cek-email" data-flashdata="<?= $this->session->flashdata('email'); ?>"></div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('password')) : ?>
                                <div class="cek-password" data-flashdata="<?= $this->session->flashdata('password'); ?>"></div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('akses')) : ?>
                                <div class="cek-akses" data-flashdata="<?= $this->session->flashdata('akses'); ?>"></div>
                            <?php endif; ?>

                            <div class="card-body">
                                <form action="<?php echo base_url('login/store') ?>" method="post">
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="email">Email</label>
                                        </div>
                                        <input id="email" type="text" class="form-control form-control-sm" name="email">

                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control form-control-sm" name="password">

                                        <div class="custom-control custom-checkbox mt-2">
                                            <input onclick="showPassword()" type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Show Password</label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- panggil assets js -->
    <?php $this->load->view('layouts/js.php'); ?>
    <script>
        var cek_email = $('.cek-email').data(cek_email);
        if (cek_email) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Email anda salah !'
            })
        }
        var cek_password = $('.cek-password').data(cek_password);
        if (cek_password) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Password anda salah !'
            })
        }

        var cek_akses = $('.cek-akses').data(cek_akses);
        if (cek_akses) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Anda tidak memiliki akses !'
            })
        }

        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>