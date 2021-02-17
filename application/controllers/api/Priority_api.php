<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Priority_api extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
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

        $i = 0;
        foreach ($data as $nama => $krit) {
            ++$i;
            foreach ($kriteria as $k) {
                round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3);
            }
        }

        $i = 0;
        $y = [];
        foreach ($data as $nama => $krit) {
            ++$i;
            foreach ($kriteria as $k) {
                $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 3) * $bobot[$k];
            }
        }

        $yplus = [];
        foreach ($kriteria as $k) {
            if ($atribut[$k] == "Benefit") {
                $yplus[$k] = ([$k] ? max($y[$k]) : min($y[$k]));
            } else {
                $yplus[$k] = ([$k] ? min($y[$k]) : max($y[$k]));
            }
        }

        $ymin = [];
        foreach ($kriteria as $k) {
            if ($atribut[$k] == "Cost") {
                $ymin[$k] = [$k] ? max($y[$k]) : min($y[$k]);
            } else {
                $ymin[$k] = [$k] ? min($y[$k]) : max($y[$k]);
            }
        }

        $i = 0;
        $dplus = [];
        foreach ($data as $nama => $krit) {
            ++$i;
            foreach ($kriteria as $k) {
                if (!isset($dplus[$i - 1]))
                    $dplus[$i - 1] = 0;
                $dplus[$i - 1] += pow($yplus[$k] - $y[$k][$i - 1], 2);
            }
        }
        $i = 0;
        $dmin = [];
        foreach ($data as $nama => $krit) {
            ++$i;
            foreach ($kriteria as $k) {
                if (!isset($dmin[$i - 1])) $dmin[$i - 1] = 0;
                $dmin[$i - 1] += pow($ymin[$k] - $y[$k][$i - 1], 2);
            }
        }

        $count_data = 0;

        $i = 0;
        $V = [];
        $nama_customer = NULL;
        $no_hp = NULL;
        $nama_barang = NULL;

        foreach ($data as $nama => $krit) {
            ++$i;

            foreach ($kriteria as $k) {
                $V[$i - 1] = sqrt($dmin[$i - 1]) / (sqrt($dmin[$i - 1]) + sqrt($dplus[$i - 1]));
            }
            $preferensi = round($V[$i - 1], 3);
            $tampung_array[] = ["nama_barang" => $nama, "nilai" => $preferensi];
        }

        // Mengurutkan array dari kecil ke besar
        function cmp($a, $b)
        {
            return strcmp($a["nilai"], $b["nilai"]);
        }
        usort($tampung_array, "cmp");
        // Di balik
        $tampung_array = array_reverse($tampung_array);
        $this->response($tampung_array, 200);
    }
}
