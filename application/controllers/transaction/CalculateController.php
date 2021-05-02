<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CalculateController extends CI_Controller
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
        $this->template->load('layouts/app', 'transaction/calculate/index');
    }

    public function priority()
    {
        $this->template->load('layouts/app', 'transaction/calculate/priority');
    }
}
