<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TransactionController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('/');
        }
        elseif ($this->session->userdata('role') != 'Kasir') {
            $this->session->sess_destroy();
            redirect('/');
        }
        $this->load->model('M_crud');
    }

    public function index()
    {
        $this->load->view('transaction/transaction/index');
    }

    public function grandTotal()
    {
        $sub_total = 0;
        $total = 0;

        if (isset($_POST['id_barang']) && isset($_POST['qty']) && isset($_POST['harga'])) {

            for ($i = 0; $i < count($_POST['id_barang']); $i++) {

                $harga_jual_temp = $_POST['harga'][$i];
                $harga_jual = (int) preg_replace("/[^0-9]/", "", $harga_jual_temp);

                $qty_temp =  $_POST['qty'][$i];
                $qty = (int) $qty_temp;

                $perhitungan = $harga_jual * $qty;

                $sub_total = $sub_total + $perhitungan;
            }

            $total = $sub_total;
        }
        if ($total == 0) {
            $total = " ";
        }
        echo $total;
    }
}
