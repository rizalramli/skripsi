<section class="section">
    <div class="section-header">
        <h1>Transaksi</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="<?php echo base_url('transaction') ?>">Kembali</a>
            </div>
            <div class="card-body">
                <h6 class="text-center">Nama Customer : <?= $item->nama_customer." (".$item->no_hp.")" ?></h6>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped dataTables">
                        <thead>
                            <tr>
                                <th width="5%" scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Qty</th>
                                <!-- <th scope="col">Status</th> -->
                                <th width="20%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($items as $item) :
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $i ?></td>
                                    <td class="align-middle"><?php echo $item->nama_barang." (".$item->nama_jenis_kain.")" ?></td>
                                    <td class="align-middle"><?php echo $item->value_kriteria ?></td>
                                    <!-- <td class="align-middle">
                                        <?php 
                                        if($item->status_pengerjaan == 'Belum Selesai'){
                                            echo '<span class="badge badge-danger">Belum</span>';
                                        }
                                        else{
                                            echo '<span class="badge badge-success">Sudah</span>';
                                        }
                                        ?>
                                    </td> -->
                                    <td class="align-middle">
                                        <a href="<?php echo base_url('transaction/' . $item->id_detail_transaksi . '/edit_detail') ?>" class="btn btn-sm btn-warning">Edit</a>
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