<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }

    public function index()
    {
        $this->load->view('login/index');
    }

    public function store()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where    = array(
            'username'  => $username,
        );

        $query = $this->M_crud->edit_data($where, 'user');
        if ($query->num_rows() > 0) {
            $hash = $query->row('password');
            if (password_verify($password, $hash)) {
                $data_session = array(
                    'nama_user' => $query->row('nama_user'),
                    'username' => $query->row('username'),
                );
                $this->session->set_userdata($data_session);
                redirect('priority');
            } else {
                $this->session->set_flashdata('password', 'Dilogin');
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('username', 'Dilogin');
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
