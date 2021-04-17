<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Login_api extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('M_crud');
    }

    function index_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where    = array(
            'username'  => $username,
        );

        $query = $this->M_crud->edit_data($where, 'user');

        $result = array();
        $result["data"] = array();
        if ($query->num_rows() > 0) {
            $hash = $query->row('password');
            if (password_verify($password, $hash)) {
                $data = array(
                    'id_user' => $query->row('id_user'),
                    'nama_user' => $query->row('nama_user'),
                    'username' => $query->row('username'),
                    'role' => $query->row('role'),
                );
                array_push($result["data"], $data);

                // membuat array untuk di transfer
                $result["response_status"] = "OK";
                $result["response_message"] = "success";
                $this->response($result, 200);
            } else {
                $result["response_status"] = "0";
                $result["response_message"] = "Password Salah";
                $this->response($result, 404);
            }
        } else {
            $result["response_status"] = "0";
            $result["response_message"] = "Username Salah";
            $this->response($result, 404);
        }
    }
}
