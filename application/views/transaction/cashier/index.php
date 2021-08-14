<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Skripsi</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo/logo.png') ?>">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/download_css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/download_css/all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/download_css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/download_css/buttons.bootstrap4.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/css/components.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/css/bootstrap-datetimepicker.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/stisla/css/bootstrap-datepicker3.min.css">

</head>



<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container-fluid">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <!-- <h4 class="text-white">Skripsi</h4> -->
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo base_url('assets/stisla/icons/avatar-1.png') ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi,
                                <?php echo $this->session->userdata('nama_user'); ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item has-icon text-danger" href="" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>

                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="text-center mb-3">Daftar Barang</h5>
                                                <div class="row">
                                                    <?php
                                                    $no = 1;
                                                    $query = $this->db->query("SELECT * FROM barang JOIN jenis_kain USING(id_jenis_kain) ORDER BY id_barang ASC");
                                                    $query = $query->result_array();
                                                    foreach ($query as $data) :
                                                        $id_barang = $data['id_barang'];
                                                        $nama_barang = $data['nama_barang'];
                                                        $nama_jenis_kain = $data['nama_jenis_kain'];
                                                        $harga = $data['harga'];
                                                    ?>
                                                        <div class="col-md-4 mb-3">
                                                            <div style="border:1px solid #016CB1" class="card">
                                                                <div class="card-body">
                                                                    <p style="margin:0" class="text-center">
                                                                        <?php echo $nama_barang ?></p>
                                                                    <p style="margin:0" class="text-center">
                                                                        <?php echo "(" . $nama_jenis_kain . ")" ?></p>
                                                                    <p style="margin:0" class="text-center">
                                                                        <?php echo rupiah($harga) ?></p>
                                                                    <div class="text-center">
                                                                        <a onclick="tambah('<?php echo $id_barang ?>','<?php echo addslashes($nama_barang) ?>','<?php echo addslashes($nama_jenis_kain) ?>','<?php echo $harga  ?>')" class="btn btn-sm btn-primary text-white mt-2">Pilih Barang</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="text-center mb-3">Daftar Barang Yang Dibeli</h5>
                                                <form method="post" id="myform" action="">
                                                    <table class="table table-sm" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-left" width="36%">Nama</td>
                                                                <td class="text-center" width="15%">Qty</td>
                                                                <!-- <td class="text-right" width="22%">Harga</td>
                                                <td class="text-right" width="22%">Sub Total</td> -->
                                                                <td class="text-center" width="22%">Kain</td>
                                                                <td class="text-center" width="22%">Kesulitan Model</td>
                                                                <td class="text-right" width="5%">&nbsp</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="label_kosong">
                                                                <td colspan="2">
                                                                    Detail Transaksi Masih Kosong !
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody id="detail_list"></tbody>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                Nama Customer
                                                            </div>
                                                            <div class="col-md-6">
                                                                No Handphone
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control form-control-sm" name="nama_customer" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input value="99999" type="text" class="form-control form-control-sm hp" name="no_hp" required>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                DP
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                Grand Total
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control form-control-sm rupiah" name="dp" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control form-control-sm rupiah text-right" name="grand_total" id="grand_total" value=" " readonly>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                Kepercayaan Ke Customer
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                &nbsp;
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select name="kepercayaan" class="form-control form-control-sm" required>
                                                                    <option value="">-- Pilih Status --</option>
                                                                    <option value="1">Sangat Tidak Yakin</option>
                                                                    <option value="3">Tidak Yakin</option>
                                                                    <option value="5">Ragu-ragu</option>
                                                                    <option value="7">Percaya</option>
                                                                    <option value="9">Sangat Percaya</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <button type="submit" name="simpan" class="btn btn-sm btn-success">Simpan Data</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah anda yakin ingin logout?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?php echo base_url('logout') ?>" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->


    <!-- General JS Scripts -->
    <script src="<?php echo base_url(); ?>assets/stisla/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/download_js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/download_js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/download_js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/download_js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/download_js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/download_js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?php echo base_url(); ?>assets/stisla/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/download_js/sweet-alert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/jquery.mask.js"></script>
    <script src="<?php echo base_url(); ?>assets/stisla/js/bootstrap-datepicker.js"></script>

    <!-- Agar input tidak ada history -->
    <script>
        $("form :input").attr("autocomplete", "off");
    </script>
    <!-- Format Rupiah -->
    <script src="<?php echo base_url(); ?>assets/stisla/js/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.rupiah').mask('000.000.000', {
                reverse: true
            });
            $('.hp').mask('000000000000000');
        })
    </script>
    <script>
        var date = new Date();
        date.setDate(date.getDate() + 1);

        $('#datepicker').datepicker({
            startDate: date
        });
    </script>

    <script>
        var count = 0;
        var jumlah_detail = 0;

        function tambah(kode, nama, jenis_kain, harga) {
            // You can't define php variables in java script as $course etc.
            $('#detail_list').append(`

                <tr id="row` + count + `" class="kelas_row">
                    <td>
                        ` + nama + " (" + jenis_kain + ")" +
                `
                        <input type="hidden" name="id_barang[]" class="form-control form-control-sm" id="kode_barang` +
                count + `" value="` + kode + `">
        <input type="hidden" name="nama_barang_detail[]" class="form-control form-control-sm" id="kode_barang` +
                count + `" value="` + nama + `">
            <input type="hidden" name="jenis_kain[]" class="form-control form-control-sm" id="jenis_kain` +
                count + `" value="` + jenis_kain + `">
                    </td>
                    <td>
                        <input type="text" name="qty[]" class="form-control form-control-sm qty hp" id="qty` + count +
                `" value="1" required>
                    </td>
                    
                        <input type="hidden" name="harga[]" class="form-control form-control-sm rupiah text-right" id="harga` +
                count + `" placeholder="Harga Tindakan BP" required value="` + harga + `" readonly>
                        <input type="hidden" class="form-control form-control-sm rupiah text-right" id="sub_total` +
                count + `" readonly required value="` + harga + `">
                    
                    <td>
                        <select name="kain[]" class="form-control form-control-sm" required>
                            <option value="">-- Pilih Status Kain --</option>
                            <option value="1">Sangat Mudah</option>
                            <option value="3">Mudah</option>
                            <option value="5">Sedang</option>
                            <option value="7">Sulit</option>
                            <option value="9">Sangat Sulit</option>
                        </select>
                    </td>
                    <td>
                        <select name="kesulitan[]" class="form-control form-control-sm" required>
                            <option value="">-- Kesulitan Model --</option>
                            <option value="1">Sangat Mudah</option>
                            <option value="3">Mudah</option>
                            <option value="5">Sedang</option>
                            <option value="7">Sulit</option>
                            <option value="9">Sangat Sulit</option>
                        </select>
                    </td>
                    <td>
                        <div class="form-group col-sm-2">
                            <a id="` + count + `" href="#" class="btn btn-sm btn-danger btn-icon-split remove_baris">x
                            </a>
                        </div>
                    </td>
                </tr>

                `);
            count = count + 1;
            jumlah_detail = jumlah_detail + 1;
            cek_jumlah_data_detail_transaksi();
            update_sub();
        }

        function validasi() {
            $('.rupiah').mask('000.000.000', {
                reverse: true
            });
        }

        function cek_jumlah_data_detail_transaksi() {

            var x = document.getElementById("label_kosong").style;
            if (jumlah_detail > 0) {

                x.display = "none"; // hidden

            } else {
                x.display = "table-row"; // show
            }
            update_sub();
        }

        $(document).on('click', '.remove_baris', function() {
            var row_no = $(this).attr("id");
            $('#row' + row_no).remove();

            jumlah_detail = jumlah_detail - 1;

            cek_jumlah_data_detail_transaksi();
            update_sub();
        });

        function update_sub() {
            // mengambil nilai di dalam form
            var form_data = $('#myform').serialize()

            $.ajax({
                url: "<?php echo base_url(); ?>/cashier/grandTotal",
                method: "POST",
                data: form_data,
                success: function(data) {
                    $('#grand_total').val(data);
                    $('.rupiah').trigger('input'); // Will be display 
                }
            });

            validasi();
        }
        $(document).on('keyup', '.qty', function() {

            var row_id = $(this).attr("id"); // qty_apotek_obat1++
            var row_no = row_id.substring(3); // 1++


            var val_qty = $('#' + row_id).val();

            // sub total
            var harga = $('#harga' + row_no).val();
            var val_harga = parseInt(harga.split('.').join(''));
            $('#sub_total' + row_no).val(val_harga * val_qty);
            $('.rupiah').trigger('input'); // Will be display 
            update_sub();
        });
    </script>
    <?php
    if (isset($_POST['simpan'])) {
        if ($_POST['grand_total'] != " ") {
            if ($_POST['grand_total'] != 0) {
                $sql = $this->db->query("SELECT max(id_transaksi) as kode_transaksi FROM transaksi");
                $kode_faktur = $sql->result_array();
                if ($kode_faktur) {
                    $nilai = substr($kode_faktur[0]['kode_transaksi'], 1);
                    $kode = (int) $nilai;
                    //tambahkan sebanyak + 1
                    $kode = $kode + 1;
                    $auto_kode = "T" . str_pad($kode, 7, "0",  STR_PAD_LEFT);
                } else {
                    $auto_kode = "T0000001";
                }
                $grand_total_temp = $_POST['grand_total'];
                $dp = $_POST['dp'];
                $dp = (int) preg_replace("/[^0-9]/", "", $dp);
                $dp_kriteria = $dp / count($_POST['id_barang']);
                $grand_total = (int) preg_replace("/[^0-9]/", "", $grand_total_temp);
                date_default_timezone_set("Asia/Jakarta");
                $nama_customer = ucwords(addslashes($_POST['nama_customer']));
                $no_hp = $_POST['no_hp'];
                $kepercayaan = $_POST['kepercayaan'];
                $tgl_pemesanan = date('Y-m-d');
                // $tgl_deadline = date("Y-m-d", strtotime($_POST['tgl_deadline']));
                // $sekarang    = new DateTime($tgl_pemesanan);
                // $deadline       = new DateTime($tgl_deadline);
                // $jarak        = $deadline->diff($sekarang);
                // $selisih = $jarak->format('%d');
                // $waktu_pengerjaan = $selisih;

                $insert = $this->db->query("INSERT INTO transaksi VALUES('$auto_kode','$tgl_pemesanan','$nama_customer','$no_hp','$dp','$grand_total','Belum')");
                if ($insert) {
                    $value_kriteria = [];
                    $tampil_kriteria = $this->db->query("SELECT * FROM kriteria");
                    $count_kriteria = $tampil_kriteria->num_rows();

                    $sql2 = $this->db->query("SELECT MAX((SUBSTRING(nama_barang_detail,-10))) as kode_transaksi_2 FROM detail_transaksi");
                    $kode_faktur2 = $sql2->result_array();
                    if ($kode_faktur2) {
                        $nilai2 = substr($kode_faktur2[0]['kode_transaksi_2'], -10);
                        $kode2 = (int) $nilai2;
                        //tambahkan sebanyak + 1
                        $kode2 = $kode2 + 1;
                        $auto_kode2 = str_pad($kode2, 10, "0",  STR_PAD_LEFT);
                    } else {
                        $auto_kode2 = "0000000001";
                    }


                    for ($j = 0; $j < $count_kriteria; $j++) {
                        $data_kriteria = $tampil_kriteria->result_array();
                        $id_kriteria = $data_kriteria[$j]['id_kriteria'];

                        for ($i = 0; $i < count($_POST['id_barang']); $i++) {


                            $id_barang = $_POST['id_barang'][$i];
                            $nama_barang = $_POST['nama_barang_detail'][$i] . " (" . $_POST['jenis_kain'][$i] . ")";
                            $nama_barang_detail_temp = $nama_customer . "," . $no_hp . "," . $nama_barang . " " . $auto_kode2 . "," . $_POST['qty'][$i];
                            $nama_barang_detail = addslashes($nama_barang_detail_temp);
                            $kain = $_POST['kain'][$i];
                            $kesulitan = $_POST['kesulitan'][$i];
                            $qty_temp =  $_POST['qty'][$i];
                            $qty = (int) $qty_temp;
                            $harga_temp = $_POST['harga'][$i];
                            $harga = (int) preg_replace("/[^0-9]/", "", $harga_temp);
                            // $value_kriteria = [$tgl_deadline, $waktu_pengerjaan, $harga, $qty, $tingkat_kesulitan];
                            $value_kriteria = [$kain, $dp_kriteria, $qty, $kepercayaan, $kesulitan];
                            $insert_detail = $this->db->query("INSERT INTO detail_transaksi (id_detail_transaksi,id_transaksi,id_barang,id_kriteria,nama_barang_detail,value_kriteria,status_pengerjaan) VALUES (NULL,'$auto_kode','$id_barang','$id_kriteria','$nama_barang_detail','$value_kriteria[$j]','Belum Selesai')");
                        }
                    }
                    if ($insert_detail) {
                        $link = base_url('cashier');
                        echo "<script>Swal.fire('Sukses','Transaksi Berhasil','success')
                            .then(function(){
                              window.location.assign('" . $link . "');
                            });</script>";
                    }
                }
            } else {
                $link = base_url('cashier');
                echo "<script>Swal.fire('Gagal','Daftar belanja kosong','error')
                    .then(function(){
                    window.location.assign('" . $link . "');
                    });</script>";
            }
        } else {
            $link = base_url('cashier');
            echo "<script>Swal.fire('Gagal','Daftar belanja kosong','error')
                    .then(function(){
                    window.location.assign('" . $link . "');
                    });</script>";
        }
    }

    ?>
</body>

</html>