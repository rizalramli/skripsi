<section class="section">
    <div class="section-header">
        <h1>Kriteria</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="<?php echo base_url('criteria/create') ?>">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-sm table-striped dataTables">
                        <thead>
                            <tr>
                                <th width="5%" scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Atribut</th>
                                <th scope="col">Bobot</th>
                                <th width="11%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($items as $item) :
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $i ?></td>
                                    <td class="align-middle"><?php echo $item->nama_kriteria ?></td>
                                    <td class="align-middle"><?php echo $item->atribut ?></td>
                                    <td class="align-middle"><?php echo $item->bobot ?></td>
                                    <td class="align-middle">
                                        <a href="<?php echo base_url('criteria/' . $item->id_kriteria . '/edit') ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus?');" href="<?php echo base_url('criteria/' . $item->id_kriteria . '/delete') ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>