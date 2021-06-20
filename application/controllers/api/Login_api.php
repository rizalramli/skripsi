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
        $email = $this->post('email');
        $password = $this->post('password');
        $where    = array(
            'email'  => $email,
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
                    'email' => $query->row('email'),
                    'role' => $query->row('role'),
                );
                array_push($result["data"], $data);
                if($query->row('role') == 'Pemilik')
                {
                    // membuat array untuk di transfer
                    $result["response_status"] = "OK";
                    $result["response_message"] = "Sukses Login";
                    $this->response($result, 200);
                }
                else 
                {
                    $result["response_status"] = "GAGAL";
                    $result["response_message"] = "Hak akses anda bukan pemilik";
                    $this->response($result, 404);
                }
            }
            else {
                $result["response_status"] = "GAGAL";
                $result["response_message"] = "Password Salah";
                $this->response($result, 404);
            }
        } else {
            $result["response_status"] = "GAGAL";
            $result["response_message"] = "Belum Punya Akun";
            $this->response($result, 404);
        }
    }
}
