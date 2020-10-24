<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index() {
        $data['title'] = "Category";
        $data['cat_info'] = $this->category_model->get_category();

        $this->load->view('backend/layouts/header');
        $this->load->view('backend/category_view',$data);
        $this->load->view('backend/layouts/footer');
    }

    function add_cat(){
        
        $this->category_model->add_cat();
        redirect('category');
    
      }
}
?>