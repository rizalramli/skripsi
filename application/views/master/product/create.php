<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-center">Tambah Data</h6>
                                <form action="<?php echo base_url('product/store') ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" class="form-control form-control-sm" id="nama" value="<?php echo set_value('nama') ?>">
                                                <span class="text-danger"><?php echo form_error('nama'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="text" name="harga" class="form-control form-control-sm" id="harga" value="<?php echo set_value('harga') ?>">
                                                <span class="text-danger"><?php echo form_error('harga'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fabric">Jenis Kain</label>
                                                <select name="fabric" id="fabric" class="form-control form-control-sm">
                                                    <?php foreach($fabric as $f):
                                                    ?>
                                                        <option value="<?= $f->id_jenis_kain ?>"><?= $f->nama_jenis_kain ?></option>
                                                    <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a href="<?php echo base_url('product') ?>" class="btn btn-default">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-center">Foto Product</h6>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
</section>