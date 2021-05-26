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
        elseif ($this->session->userdata('role') != 'Admin') {
            $this->session->sess_destroy();
            redirect('/');
        }
        $this->load->model('M_crud');
    }

    public function index()
    {
        $data['items'] = $this->db->query('SELECT * FROM transaksi ORDER BY tgl_transaksi DESC')->result();
        $this->template->load('layouts/app', 'transaction/transaction/index', $data);
    }

    public function edit($id)
    {
        $where = array('id_transaksi' => $id);
        $data['item'] = $this->M_crud->edit_data($where, 'transaksi')->row();

        $this->template->load('layouts/app', 'transaction/transaction/edit', $data);
    }

    public function update()
    {
        $id_transaksi  = $this->input->post('id_transaksi');
        $down_payment  = (int) preg_replace("/[^0-9]/", "", $this->input->post('down_payment'));

        $this->form_validation->set_rules('down_payment', 'DP', 'required');

        $where = array(
            'id_transaksi' => $id_transaksi,
        ); 

        $data['item'] = $this->M_crud->edit_data($where, 'transaksi')->row();

        if ($this->form_validation->run() != false) {

            $data = array(
                'down_payment' => $down_payment,
            );
            $where = array(
                'id_transaksi' => $id_transaksi
            );
 
            $this->M_crud->update_data($where, $data, 'transaksi');
            
            $this->db->select('*');
            $this->db->from('detail_transaksi');
            $this->db->where('detail_transaksi.id_transaksi', $id_transaksi);
            $this->db->where('detail_transaksi.id_kriteria', 6);
            $count = $this->db->count_all_results();

            $data = array(
                'value_kriteria' => $down_payment / $count,
            );
            $where = array(
                'id_transaksi' => $id_transaksi,
                'id_kriteria' => 6
            );
 
            $this->M_crud->update_data($where, $data, 'detail_transaksi');

            redirect('transaction');

        } else {
            $this->template->load('layouts/app', 'transaction/transaction/edit', $data);
        }
    }

    public function detail($id)
    {
        $where = array('id_transaksi' => $id);
        $data['item'] = $this->M_crud->edit_data($where, 'transaksi')->row();
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('barang', 'detail_transaksi.id_barang = barang.id_barang');
        $this->db->join('jenis_kain', 'barang.id_jenis_kain = jenis_kain.id_jenis_kain');
        $this->db->where('detail_transaksi.id_transaksi', $id);
        $this->db->where('detail_transaksi.id_kriteria', 7);
        $query = $this->db->get();
        $data['items'] = $query->result();
        $this->template->load('layouts/app', 'transaction/transaction/detail', $data);
    }

    public function edit_detail($id)
    {
        $where = array('id_detail_transaksi' => $id);
        $detail = $this->M_crud->edit_data($where, 'detail_transaksi')->row();
        $id_transaksi = $detail->id_transaksi;
        // $where = array('id_transaksi' => $id_transaksi,'id_kriteria' => 5);
        // $data['item'] = $this->M_crud->edit_data($where, 'detail_transaksi')->row();
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('barang', 'detail_transaksi.id_barang = barang.id_barang');
        $this->db->join('jenis_kain', 'barang.id_jenis_kain = jenis_kain.id_jenis_kain');
        $this->db->where('detail_transaksi.id_transaksi', $id_transaksi);
        $this->db->where('detail_transaksi.id_kriteria', 5);
        $query = $this->db->get();
        $data['item'] = $query->row();

        $this->template->load('layouts/app', 'transaction/transaction/edit_detail', $data);
    }

    public function update_detail()
    {
        $id_detail_transaksi  = $this->input->post('id_detail_transaksi');
        $kain  = $this->input->post('kain');

        $data = array(
            'value_kriteria' => $kain,
        );
        $where = array(
            'id_detail_transaksi' => $id_detail_transaksi
        );

        $this->M_crud->update_data($where, $data, 'detail_transaksi');
        redirect('transaction');
        
    }
}
