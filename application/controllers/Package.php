<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index(){

        $data['title'] = "Package";
        $data['prod_info'] = $this->products_model->get_products();
        $data['pack_info'] = $this->package_model->get_package();
        $this->load->view('backend/layouts/header',$data);
        $this->load->view('backend/package_view',$data);
        $this->load->view('backend/layouts/footer');
    }

    function add_package(){
        $this->package_model->add_package();
        redirect('package');
    }
}
?>