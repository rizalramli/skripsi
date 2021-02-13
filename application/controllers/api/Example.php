<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Example extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('user')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('user')->result();
        }
        $this->response($kontak, 200);
    }
}
