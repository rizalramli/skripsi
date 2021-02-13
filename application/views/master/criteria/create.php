<section class="section">
    <div class="section-header">
        <h1>Kriteria</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h6 class="text-center">Tambah Data</h6>
                <form action="<?php echo base_url('criteria/store') ?>" method="post">
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
                                <label for="atribut">Atribut</label>
                                <select name="atribut" id="atribut" class="form-control form-control-sm">
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bobot">Bobot</label>
                                <input type="text" name="bobot" class="form-control form-control-sm" id="bobot" value="<?php echo set_value('bobot') ?>">
                                <span class="text-danger"><?php echo form_error('bobot'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('criteria') ?>" class="btn btn-default">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>