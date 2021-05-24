<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FabricController extends CI_Controller
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
        $table = 'jenis_kain';
        $data['items'] = $this->M_crud->tampil_data($table)->result();
        $this->template->load('layouts/app', 'master/fabric/index', $data);
    }

    public function create()
    {
        $this->template->load('layouts/app', 'master/fabric/create');
    }

    public function store()
    {
        $nama  = $this->input->post('nama');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() != false) {
            $data = array(
                'nama_jenis_kain'      => $nama,
            );
            $this->M_crud->input_data($data, 'jenis_kain');
            redirect('fabric');
        } else {
            $this->template->load('layouts/app', 'master/fabric/create');
        }
    }

    public function edit($id)
    {
        $where = array('id_jenis_kain' => $id);
        $data['item'] = $this->M_crud->edit_data($where, 'jenis_kain')->row();

        $this->template->load('layouts/app', 'master/fabric/edit', $data);
    }

    public function update()
    {
        $id_jenis_kain  = $this->input->post('id_jenis_kain');
        $nama  = $this->input->post('nama');

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $where = array(
            'id_jenis_kain' => $id_jenis_kain,
        );
        $data['item'] = $this->M_crud->edit_data($where, 'jenis_kain')->row();
        // 

        if ($this->form_validation->run() != false) {

            $data = array(
                'nama_jenis_kain' => $nama,
            );
            $where = array(
                'id_jenis_kain' => $id_jenis_kain
            );

            $this->M_crud->update_data($where, $data, 'jenis_kain');


            redirect('fabric');
        } else {
            $this->template->load('layouts/app', 'master/fabric/edit', $data);
        }
    }

    public function delete($id)
    {
        $where = array(
            'id_jenis_kain' => $id
        );

        $this->M_crud->hapus_data($where, 'jenis_kain');
        redirect('fabric');
    }
}
