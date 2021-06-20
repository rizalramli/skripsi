<section class="section">
    <div class="section-header">
        <h1>Transaksi</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped dataTables">
                        <thead>
                            <tr>
                                <th width="5%" scope="col">No</th>
                                <!-- <th scope="col">Status</th> -->
                                <!-- <th scope="col">Tanggal Order</th> -->
                                <th scope="col">Nama</th>
                                <th scope="col">HP</th>
                                <th scope="col">DP</th>
                                <th scope="col">Total</th>
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
                                    <!-- <td class="align-middle">
                                        <?php 
                                        if($item->status_transaksi == 'Belum'){
                                            echo '<span class="badge badge-danger">Belum</span>';
                                        }
                                        else{
                                            echo '<span class="badge badge-success">Sudah</span>';
                                        }
                                        ?>
                                    </td> -->
                                    <!-- <td class="align-middle"><?php echo date('d-m-Y',strtotime($item->tgl_transaksi)) ?></td> -->
                                    <td class="align-middle"><?php echo $item->nama_customer ?></td>
                                    <td class="align-middle"><?php echo $item->no_hp ?></td>
                                    <td class="align-middle text-right"><?php echo rupiah($item->down_payment) ?></td>
                                    <td class="align-middle text-right"><?php echo rupiah($item->total_harga) ?></td>
                                    <td class="align-middle">
                                        <a href="<?php echo base_url('transaction/' . $item->id_transaksi . '/edit') ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?php echo base_url('transaction/' . $item->id_transaksi . '/detail') ?>" class="btn btn-sm btn-primary">Detail</a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus?');" href="<?php echo base_url('transaction/' . $item->id_transaksi . '/delete') ?>" class="btn btn-sm btn-danger">Hapus</a>
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