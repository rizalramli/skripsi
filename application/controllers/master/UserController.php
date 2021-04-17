<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('/');
        }
        $this->load->model('M_crud');
    }

    public function index()
    {
        $table = 'user';
        $data['items'] = $this->M_crud->tampil_data($table)->result();
        $this->template->load('layouts/app', 'master/user/index', $data);
    }

    public function create()
    {
        $this->template->load('layouts/app', 'master/user/create');
    }

    public function store()
    {
        $nama_user  = $this->input->post('nama_user');
        $email  = $this->input->post('email');
        $password  = $this->input->post('password');

        $this->form_validation->set_rules('nama_user', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {
            $data = array(
                'nama_user'      => $nama_user,
                'email'      => $email,
                'password'     => password_hash($password, PASSWORD_DEFAULT),
                'role' => 'Admin'
            );
            $this->M_crud->input_data($data, 'user');
            redirect('user');
        } else {
            $this->template->load('layouts/app', 'master/user/create');
        }
    }


    public function delete($id)
    {
        $where = array(
            'id_user' => $id
        );

        $this->M_crud->hapus_data($where, 'user');
        redirect('user');
    }
}
