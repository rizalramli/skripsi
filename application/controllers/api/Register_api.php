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

    function index_post()
    {
        $where    = array(
            'email'  => $this->post('email'),
        );

        $query = $this->M_crud->edit_data($where, 'user');
        $result = array();
        $result["data"] = array();
        if ($query->num_rows() > 0) {
            $result["response_status"] = "GAGAL";
            $result["response_message"] = "Email sudah digunakan";
            $this->response($result, 404);
        } else {
            $data = array(
                'nama_user' => $this->post('nama_user'),
                'email' => $this->post('email'),
                'password' => password_hash($this->post('password'), PASSWORD_DEFAULT),
                'role' => 'Customer',
            );
            $insert = $this->M_crud->input_data($data, 'user');
            $insert = json_encode($insert);
            if ($insert) {
                array_push($result["data"], $data);
                // membuat array untuk di transfer
                $result["response_status"] = "OK";
                $result["response_message"] = "Sukses Registrasi";
                $this->response($result, 200);
            } else {
                $result["response_status"] = "GAGAL";
                $result["response_message"] = "Gagal Registrasi";
                $this->response($result, 404);
            }
        }
    }
}
