<section class="section">
    <div class="section-header">
        <h1>Kriteria</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h6 class="text-center">Tambah Data</h6>
                <form action="<?php echo base_url('user/store') ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_user">Nama</label>
                                <input type="text" name="nama_user" class="form-control form-control-sm" id="nama_user" value="<?php echo set_value('nama_user') ?>">
                                <span class="text-danger"><?php echo form_error('nama_user'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control form-control-sm" id="username" value="<?php echo set_value('username') ?>">
                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control form-control-sm" id="password" value="<?php echo set_value('password') ?>">
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('user') ?>" class="btn btn-default">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>