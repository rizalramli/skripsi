<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CalculateController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }

    public function index()
    {
        $table = 'kriteria';
        $data['items'] = $this->M_crud->tampil_data($table)->result();
        $this->template->load('layouts/app', 'master/criteria/index', $data);
    }
}
