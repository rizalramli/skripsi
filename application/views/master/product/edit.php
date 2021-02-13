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
                                <form action="<?php echo base_url('product/update') ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="hidden" name="id_barang" value="<?php echo $item->id_barang ?>">
                                                <input type="text" name="nama" class="form-control form-control-sm" id="nama" value="<?php echo $item->nama_barang ?>">
                                                <span class="text-danger"><?php echo form_error('nama'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="text" name="harga" class="form-control form-control-sm" id="harga" value="<?php echo $item->harga ?>">
                                                <span class="text-danger"><?php echo form_error('harga'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tingkat_kesulitan">Tingkat Kesulitan</label>
                                                <select name="tingkat_kesulitan" id="tingkat_kesulitan" class="form-control form-control-sm">
                                                    <option value="1" <?php if ($item->tingkat_kesulitan == "1") {
                                                                            echo 'selected';
                                                                        } ?>>Mudah</option>
                                                    <option value="2" <?php if ($item->tingkat_kesulitan == "2") {
                                                                            echo 'selected';
                                                                        } ?>>Sangat Mudah</option>
                                                    <option value="3" <?php if ($item->tingkat_kesulitan == "3") {
                                                                            echo 'selected';
                                                                        } ?>>Sedang</option>
                                                    <option value="4" <?php if ($item->tingkat_kesulitan == "4") {
                                                                            echo 'selected';
                                                                        } ?>>Sulit</option>
                                                    <option value="5" <?php if ($item->tingkat_kesulitan == "5") {
                                                                            echo 'selected';
                                                                        } ?>>Sangat Sulit</option>
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