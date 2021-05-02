<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CriteriaController extends CI_Controller
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
        $table = 'kriteria';
        $data['items'] = $this->M_crud->tampil_data($table)->result();
        $this->template->load('layouts/app', 'master/criteria/index', $data);
    }

    public function create()
    {
        $this->template->load('layouts/app', 'master/criteria/create');
    }

    public function store()
    {
        $nama  = $this->input->post('nama');
        $atribut  = $this->input->post('atribut');
        $bobot  = $this->input->post('bobot');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');

        if ($this->form_validation->run() != false) {
            $data = array(
                'nama_kriteria'      => $nama,
                'atribut'      => $atribut,
                'bobot'     => $bobot,
            );
            $this->M_crud->input_data($data, 'kriteria');
            redirect('criteria');
        } else {
            $this->template->load('layouts/app', 'master/criteria/create');
        }
    }

    public function edit($id)
    {
        $where = array('id_kriteria' => $id);
        $data['item'] = $this->M_crud->edit_data($where, 'kriteria')->row();

        $this->template->load('layouts/app', 'master/criteria/edit', $data);
    }

    public function update()
    {
        $id_kriteria  = $this->input->post('id_kriteria');
        $nama  = $this->input->post('nama');
        $atribut  = $this->input->post('atribut');
        $bobot  = $this->input->post('bobot');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');

        $where = array(
            'id_kriteria' => $id_kriteria,
        );
        $data['item'] = $this->M_crud->edit_data($where, 'kriteria')->row();
        // 

        if ($this->form_validation->run() != false) {

            $data = array(
                'nama_kriteria' => $nama,
                'atribut' => $atribut,
                'bobot' => $bobot,
            );
            $where = array(
                'id_kriteria' => $id_kriteria
            );

            $this->M_crud->update_data($where, $data, 'kriteria');

            redirect('criteria');
        } else {
            $this->template->load('layouts/app', 'master/criteria/edit', $data);
        }
    }

    public function delete($id)
    {
        $where = array(
            'id_kriteria' => $id
        );

        $this->M_crud->hapus_data($where, 'kriteria');
        redirect('criteria');
    }
}
