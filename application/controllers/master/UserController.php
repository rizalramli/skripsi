<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }

    public function index()
    {
        $this->template->load('layouts/app', 'master/user/index');
    }
}
