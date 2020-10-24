<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index() { 
        $this->load->view('backend/layouts/header');
        $this->load->view('backend/clients_view');
        $this->load->view('backend/layouts/footer');
    }
}
?>