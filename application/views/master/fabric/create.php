<section class="section">
    <div class="section-header">
        <h1>Jenis Kain</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h6 class="text-center">Tambah Data</h6>
                <form action="<?php echo base_url('fabric/store') ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Jenis Kain</label>
                                <input type="text" name="nama" class="form-control form-control-sm" id="nama" value="<?php echo set_value('nama') ?>">
                                <span class="text-danger"><?php echo form_error('nama'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('fabric') ?>" class="btn btn-default">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>