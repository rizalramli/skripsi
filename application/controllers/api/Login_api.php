<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Login_api extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
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
        $result['login'] = array();
        if ($query->num_rows() > 0) {
            $hash = $query->row('password');
            if (password_verify($password, $hash)) {
                $data = array(
                    'id_user' => $query->row('id_user'),
                    'nama_user' => $query->row('nama_user'),
                    'username' => $query->row('username'),
                    'role' => $query->row('role'),
                );
                array_push($result['login'], $data);

                // membuat array untuk di transfer
                $result["success"] = "1";
                $result["message"] = "success";
                $this->response($result, 200);
            } else {
                $result["success"] = "0";
                $result["message"] = "Password Salah";
                $this->response($result, 404);
            }
        } else {
            $result["success"] = "0";
            $result["message"] = "Username Salah";
            $this->response($result, 404);
        }
    }
}
