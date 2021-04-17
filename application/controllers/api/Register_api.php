<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Register_api extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('M_crud');
    }

    function index_get()
    {
        $product = $this->db->get('barang')->result();
        $this->response($product, 200);
    }

    function index_post() {
        $data = array(
                'nama_user' => $this->post('nama_user'),
                'email' => $this->post('email'),
                'password' => $this->post('password'),
                'role' => 'Customer',
        );
        $insert = $this->M_crud->input_data($data,'user');
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
}
