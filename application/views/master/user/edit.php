<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h6 class="text-center">Edit Data</h6>
                <form action="<?php echo base_url('user/update') ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="hidden" name="id_user" value="<?php echo $item->id_user ?>">
                                <input type="text" name="nama_user" class="form-control form-control-sm" id="nama" value="<?php echo $item->nama_user ?>">
                                <span class="text-danger"><?php echo form_error('nama_user'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control form-control-sm" id="email" value="<?php echo $item->email ?>">
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control form-control-sm" id="password" value="">
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" class="form-control form-control-sm" id="role" value="<?php echo $item->role ?>">
                                <span class="text-danger"><?php echo form_error('role'); ?></span>
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