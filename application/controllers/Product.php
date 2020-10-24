<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index() { 
        $this->load->view('backend/layouts/header');
        $this->load->view('backend/products_view');
        $this->load->view('backend/layouts/footer');
    }
}
?>