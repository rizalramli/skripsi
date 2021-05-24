<section class="section">
    <div class="section-header">
        <h1>Jenis Kain</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="<?php echo base_url('fabric/create') ?>">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped dataTables">
                        <thead>
                            <tr>
                                <th width="5%" scope="col">No</th>
                                <th scope="col">Jenis Kain</th>
                                <th width="15%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($items as $item) :
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $i ?></td>
                                    <td class="align-middle"><?php echo $item->nama_jenis_kain ?></td>
                                    <td class="align-middle">
                                        <a href="<?php echo base_url('fabric/' . $item->id_jenis_kain . '/edit') ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus?');" href="<?php echo base_url('fabric/' . $item->id_jenis_kain . '/delete') ?>" class="btn btn-sm btn-danger">Hapus</a>
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