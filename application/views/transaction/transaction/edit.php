<section class="section">
    <div class="section-header">
        <h1>Transaksi</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h6 class="text-center">Edit Data</h6>
                <form action="<?php echo base_url('transaction/update') ?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Customer</label>
                                <input type="hidden" name="id_transaksi" value="<?php echo $item->id_transaksi ?>">
                                <input type="text" name="nama" class="form-control form-control-sm" id="nama" value="<?php echo $item->nama_customer ?>" readonly>
                                <span class="text-danger"><?php echo form_error('nama'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" class="form-control form-control-sm" id="no_hp" value="<?php echo $item->no_hp ?>" readonly>
                                <span class="text-danger"><?php echo form_error('no_hp'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="down_payment">Jumlah DP</label>
                                <input type="text" name="down_payment" class="form-control form-control-sm rupiah" id="down_payment" value="<?php echo rupiah($item->down_payment) ?>">
                                <span class="text-danger"><?php echo form_error('down_payment'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="text" name="total_harga" class="form-control form-control-sm rupiah" id="total_harga" value="<?php echo rupiah($item->total_harga) ?>" readonly>
                                <span class="text-danger"><?php echo form_error('total_harga'); ?></span>
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