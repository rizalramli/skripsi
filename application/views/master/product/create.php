<section class="section">
    <div class="section-header">
        <h1>Barang</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
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
                                                <label for="tingkat_kesulitan">Tingkat Kesulitan</label>
                                                <select name="tingkat_kesulitan" id="tingkat_kesulitan" class="form-control form-control-sm">
                                                    <option value="1">Mudah</option>
                                                    <option value="2">Sangat Mudah</option>
                                                    <option value="3">Sedang</option>
                                                    <option value="4">Sulit</option>
                                                    <option value="5">Sangat Sulit</option>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-center">Foto Product</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>