<section class="section">
    <div class="section-header">
        <h1>Detail Transaksi</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h6 class="text-center">Edit Data</h6>
                <form action="<?php echo base_url('transaction/update_detail') ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="hidden" name="id_detail_transaksi" value="<?php echo $item->id_detail_transaksi ?>">
                                <input type="text" name="nama" class="form-control form-control-sm" id="nama" value="<?php echo $item->nama_barang." (".$item->nama_jenis_kain.")" ?>" readonly>
                                <span class="text-danger"><?php echo form_error('nama'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kain">Tingkat Kesulitan Kain</label>
                                <select name="kain" id="kain" class="form-control form-control-sm">
                                    <option value="1" <?php if ($item->value_kriteria == "1") {
                                                            echo 'selected';
                                                        } ?>>Mudah</option>
                                    <option value="3" <?php if ($item->value_kriteria == "3") {
                                                            echo 'selected';
                                                        } ?>>Sangat Mudah</option>
                                    <option value="5" <?php if ($item->value_kriteria == "5") {
                                                            echo 'selected';
                                                        } ?>>Sedang</option>
                                    <option value="7" <?php if ($item->value_kriteria == "7") {
                                                            echo 'selected';
                                                        } ?>>Sulit</option>
                                    <option value="9" <?php if ($item->value_kriteria == "9") {
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
                                <a href="<?php echo base_url('transaction') ?>" class="btn btn-default">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>