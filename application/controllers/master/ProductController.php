<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('/');
        }
        $this->load->model('M_crud');
    }

    public function index()
    {
        $table = 'barang';
        $data['items'] = $this->M_crud->tampil_data($table)->result();
        $this->template->load('layouts/app', 'master/product/index', $data);
    }

    public function create()
    {
        $this->template->load('layouts/app', 'master/product/create');
    }

    public function store()
    {
        $nama  = $this->input->post('nama');
        $harga  = $this->input->post('harga');
        $tingkat_kesulitan  = $this->input->post('tingkat_kesulitan');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() != false) {
            $data = array(
                'nama_barang'      => $nama,
                'harga'      => $harga,
                'tingkat_kesulitan'     => $tingkat_kesulitan,
            );
            $this->M_crud->input_data($data, 'barang');
            redirect('product');
        } else {
            $this->template->load('layouts/app', 'master/product/create');
        }
    }

    public function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['item'] = $this->M_crud->edit_data($where, 'barang')->row();

        $this->template->load('layouts/app', 'master/product/edit', $data);
    }

    public function update()
    {
        $id_barang  = $this->input->post('id_barang');
        $nama  = $this->input->post('nama');
        $harga  = $this->input->post('harga');
        $tingkat_kesulitan  = $this->input->post('tingkat_kesulitan');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        $where = array(
            'id_barang' => $id_barang,
        );
        $data['item'] = $this->M_crud->edit_data($where, 'barang')->row();
        // 

        if ($this->form_validation->run() != false) {

            $data = array(
                'nama_barang'      => $nama,
                'harga'      => $harga,
                'tingkat_kesulitan'     => $tingkat_kesulitan,
            );
            $where = array(
                'id_barang' => $id_barang
            );

            $this->M_crud->update_data($where, $data, 'barang');

            redirect('product');
        } else {
            $this->template->load('layouts/app', 'master/product/edit', $data);
        }
    }

    public function delete($id)
    {
        $where = array(
            'id_barang' => $id
        );

        $this->M_crud->hapus_data($where, 'barang');
        redirect('product');
    }
}
