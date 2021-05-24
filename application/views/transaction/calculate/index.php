<section class="section">
    <div class="section-header">
        <h1>Perhitungan AHP-TOPSIS</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Evaluation Matrix (x<sub>ij</sub>)</h3>
            </div>
            <div class="card-body">
                <?php
                $query_default = $this->db->query("SELECT * FROM detail_transaksi JOIN transaksi USING(id_transaksi) JOIN kriteria USING (id_kriteria) JOIN barang USING(id_barang) WHERE status_pengerjaan='Belum Selesai'");
                $query = $query_default->result_array();
                $jumlah_batas = $query_default->num_rows();
                $data      = [];
                $kriterias = [];
                $bobot     = [];
                $atribut     = [];
                $nilai_kuadrat = [];
                $tanggal_deadline = "";
                if ($query) {
                    foreach ($query as $row) {
                        if (!isset($data[$row['nama_barang_detail']])) {
                            $data[$row['nama_barang_detail']] = [];
                        }
                        if (!isset($data[$row['nama_barang_detail']][$row['nama_kriteria']])) {
                            $data[$row['nama_barang_detail']][$row['nama_kriteria']] = [];
                        }

                        if (!isset($nilai_kuadrat[$row['nama_kriteria']])) {
                            $nilai_kuadrat[$row['nama_kriteria']] = 0;
                        }


                        if ($row['nama_kriteria'] == "Sisa Hari") {
                            date_default_timezone_set("Asia/Jakarta");
                            $tanggal_deadline = date("Y-m-d", strtotime($row['value_kriteria']));
                            $sekarang = date("Y-m-d");
                            $selisih = ((strtotime($tanggal_deadline) - strtotime($sekarang)) / (60 * 60 * 24));
                            $row['value_kriteria'] = (int) $selisih;
                            if ($row['value_kriteria'] < 0) {
                                $row['value_kriteria'] = 0.001;
                            }
                        }
                        $bobot[$row['nama_kriteria']] = $row['bobot'];
                        $atribut[$row['nama_kriteria']] = $row['atribut'];
                        $data[$row['nama_barang_detail']][$row['nama_kriteria']] = $row['value_kriteria'];
                        $nilai_kuadrat[$row['nama_kriteria']] += pow($row['value_kriteria'], 2);
                        $kriterias[] = $row['nama_kriteria'];
                    }
                }
                $kriteria     = array_unique($kriterias);
                $jml_kriteria = count($kriteria);
                $count_data = 0;
                ?>
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">Barang</th>
                                    <th class="text-center" rowspan="2">Customer</th>
                                    <th class="text-center" colspan="<?php echo $jml_kriteria; ?>">KRITERIA</th>
                                </tr>
                                <tr>
                                    <?php
                                    foreach ($kriteria as $k) {;
                                    ?>
                                        <th class="text-center"><?php echo $k ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $nama_customer = NULL;
                                $no_hp = NULL;
                                $nama_barang = NULL;
                                foreach ($data as $nama => $krit) {
                                    $explode = explode(",", $nama);
                                    $nama_customer = $explode[0];
                                    $no_hp = $explode[1];
                                    $nama_barang = $explode[2];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$i . "." ?></td>
                                        <td><?php echo substr($nama_barang, 0, -10) ?></td>
                                        <td><?php echo stripcslashes($nama_customer) ?></td>
                                        <?php
                                        foreach ($kriteria as $k) {
                                        ?>
                                            <?php
                                            if ($k == 'Harga') {
                                                echo "<td class='text-right'>" . rupiah($krit[$k]) . "</td>";
                                            } else if ($krit[$k] == 0.001) {
                                                echo "<td class='text-right'>0</td>";
                                            } else {
                                                echo "<td class='text-center'>$krit[$k]</td>";
                                            }
                                            ?>

                                    <?php
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Tabel Ternormalisasi (r<sub>ij</sub>)</h3>
            </div>
            <div class="card-body">
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">Barang</th>
                                    <th class="text-center" rowspan="2">Customer</th>
                                    <th class="text-center" colspan="<?php echo $jml_kriteria; ?>">KRITERIA</th>
                                </tr>
                                <tr>
                                    <?php
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <th class="text-center"><?php echo $k ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $nama_customer = NULL;
                                $no_hp = NULL;
                                $nama_barang = NULL;
                                foreach ($data as $nama => $krit) {
                                    $explode = explode(",", $nama);
                                    $nama_customer = $explode[0];
                                    $no_hp = $explode[1];
                                    $nama_barang = $explode[2];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$i . "." ?></td>
                                        <td><?php echo substr($nama_barang, 0, -10) ?></td>
                                        <td><?php echo stripcslashes($nama_customer) ?></td>
                                        <?php
                                        foreach ($kriteria as $k) {
                                        ?>
                                            <td class="text-center"><?php echo round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Tabel Ternormalisasi Bobot (y<sub>ij</sub>)</h3>
            </div>
            <div class="card-body">
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%" rowspan="2">No</th>
                                    <th class="text-center" rowspan="2">Barang</th>
                                    <th class="text-center" rowspan="2">Customer</th>
                                    <th class="text-center" colspan="<?php echo $jml_kriteria; ?>">KRITERIA</th>
                                </tr>
                                <tr>
                                    <?php
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <th class="text-center"><?php echo $k ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $y = [];
                                $nama_customer = NULL;
                                $no_hp = NULL;
                                $nama_barang = NULL;
                                foreach ($data as $nama => $krit) {
                                    $explode = explode(",", $nama);
                                    $nama_customer = $explode[0];
                                    $no_hp = $explode[1];
                                    $nama_barang = $explode[2];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$i . "." ?></td>
                                        <td><?php echo substr($nama_barang, 0, -10) ?></td>
                                        <td><?php echo stripcslashes($nama_customer) ?></td>
                                        <?php
                                        foreach ($kriteria as $k) {
                                            $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * $bobot[$k];
                                        ?>
                                            <td class="text-center"><?php echo round($y[$k][$i - 1],3) ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Solusi Ideal positif (A<sup>+</sup>)</h3>
            </div>
            <div class="card-body">
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                </tr>
                                <tr>
                                    <?php
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <th class="text-center"><?php echo $k ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    for ($n = 1; $n <= $jml_kriteria; $n++) {
                                    ?>
                                        <th>y<sub><?php echo $n ?></sub><sup>+</sup></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $yplus = [];
                                    foreach ($kriteria as $k) {
                                        if ($atribut[$k] == "Benefit") {
                                            $yplus[$k] = ([$k] ? max($y[$k]) : min($y[$k]));
                                        } else {
                                            $yplus[$k] = ([$k] ? min($y[$k]) : max($y[$k]));
                                        }
                                        echo "<th>".round($yplus[$k],3)."</th>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Solusi Ideal negatif (A<sup>-</sup>)</h3>
            </div>
            <div class="card-body">
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
                                </tr>
                                <tr>
                                    <?php
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <th class="text-center"><?php echo $k ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    for ($n = 1; $n <= $jml_kriteria; $n++) {
                                    ?>
                                        <th>y<sub><?php echo $n ?></sub><sup>-</sup></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $ymin = [];
                                    foreach ($kriteria as $k) {
                                        if ($atribut[$k] == "Cost") {
                                            $ymin[$k] = [$k] ? max($y[$k]) : min($y[$k]);
                                        } else {
                                            $ymin[$k] = [$k] ? min($y[$k]) : max($y[$k]);
                                        }
                                        echo "<th>".round($ymin[$k],3)."</th>";
                                    }

                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Jarak positif (D<sub>i</sub><sup>+</sup>)</h3>
            </div>
            <div class="card-body">
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Barang</th>
                                    <th>Customer</th>
                                    <th>D<suo>+</sup></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $dplus = [];
                                $nama_customer = NULL;
                                $no_hp = NULL;
                                $nama_barang = NULL;
                                foreach ($data as $nama => $krit) {
                                    $explode = explode(",", $nama);
                                    $nama_customer = $explode[0];
                                    $no_hp = $explode[1];
                                    $nama_barang = $explode[2];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$i . "." ?></td>
                                        <td><?php echo substr($nama_barang, 0, -10) ?></td>
                                        <td><?php echo stripcslashes($nama_customer) ?></td>
                                        <?php
                                        foreach ($kriteria as $k) {
                                            if (!isset($dplus[$i - 1]))
                                                $dplus[$i - 1] = 0;
                                            $dplus[$i - 1] += pow($yplus[$k] - $y[$k][$i - 1], 2);
                                        }
                                        ?>
                                        <td><?php echo round(sqrt($dplus[$i - 1]), 3) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Jarak negatif (D<sub>i</sub><sup>-</sup>)</h3>
            </div>
            <div class="card-body">
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Barang</th>
                                    <th>Customer</th>
                                    <th>D<suo>-</sup></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $dmin = [];
                                $nama_customer = NULL;
                                $no_hp = NULL;
                                $nama_barang = NULL;
                                foreach ($data as $nama => $krit) {
                                    $explode = explode(",", $nama);
                                    $nama_customer = $explode[0];
                                    $no_hp = $explode[1];
                                    $nama_barang = $explode[2];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$i . "." ?></td>
                                        <td><?php echo substr($nama_barang, 0, -10) ?></td>
                                        <td><?php echo stripcslashes($nama_customer) ?></td>
                                        <?php
                                        foreach ($kriteria as $k) {
                                            if (!isset($dmin[$i - 1])) $dmin[$i - 1] = 0;
                                            $dmin[$i - 1] += pow($ymin[$k] - $y[$k][$i - 1], 2);
                                        }
                                        ?>
                                        <td><?php echo round(sqrt($dmin[$i - 1]), 3) ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="m-0 font-weight-bold text-primary">Nilai Preferensi(V<sub>i</sub>)</h3>
            </div>
            <div class="card-body">
                <?php
                $count_data = count($data);
                if ($count_data > 1) {
                ?>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped dataTables">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Barang</th>
                                    <th>Customer</th>
                                    <th>V<sub>i</sub></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $V = [];
                                $nama_customer = NULL;
                                $no_hp = NULL;
                                $nama_barang = NULL;
                                foreach ($data as $nama => $krit) {
                                    $explode = explode(",", $nama);
                                    $nama_customer = $explode[0];
                                    $no_hp = $explode[1];
                                    $nama_barang = $explode[2];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$i . "." ?></td>
                                        <td><?php echo substr($nama_barang, 0, -10) ?></td>
                                        <td><?php echo stripcslashes($nama_customer) ?></td>
                                        <?php
                                        foreach ($kriteria as $k) {
                                            $dminPrefensi = round(sqrt($dmin[$i - 1]),3);
                                            $dplusPrefensi = round(sqrt($dplus[$i - 1]),3);
                                            $V[$i - 1] = $dminPrefensi / ($dminPrefensi + $dplusPrefensi);
                                        }
                                        $preferensi = round($V[$i - 1], 3);
                                        ?>
                                        <td><?php echo $preferensi ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2 class="text-center">Minimal 2 Data Barang Pesanan</h2>
                <?php } ?>
            </div>
        </div>
    </div>
</section>