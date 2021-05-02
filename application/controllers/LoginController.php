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
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where    = array(
            'email'  => $email,
        );

        $query = $this->M_crud->edit_data($where, 'user');
        if ($query->num_rows() > 0) {
            $hash = $query->row('password');
            if (password_verify($password, $hash)) {
                if ($query->row('role') == "Admin" || $query->row('role') == "Kasir") {
                    $data_session = array(
                        'nama_user' => $query->row('nama_user'),
                        'email' => $query->row('email'),
                        'role' => $query->row('role'),
                    );
                    $this->session->set_userdata($data_session);
                    if($query->row('role') == 'Admin')
                    {
                        redirect('priority');
                    }
                    elseif($query->row('role') == 'Kasir')
                    {
                        redirect('transaction');
                    }
                } else {
                    $this->session->set_flashdata('akses', 'Diakses');
                    redirect('/');
                }
            } else {
                $this->session->set_flashdata('password', 'Dilogin');
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('email', 'Dilogin');
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
