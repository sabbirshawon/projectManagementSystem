<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index() { 

        $data['title'] = "Product";
        $data['pro_info'] = $this->products_model->get_product();
        $data['cat_info'] = $this->products_model->get_category();
        $this->load->view('backend/layouts/header',$data);
        $this->load->view('backend/products_view',$data);
        $this->load->view('backend/layouts/footer');
    }

    function add_prod(){
        $this->products_model->add_prod();
        redirect('product');
    }

    function edit_prod(){
        $data['edit_prod'] = $this->products_model->edit_prod();
        redirect('product');
      }
    
    
        function get_prod_info_for_edit(){
            $product_id = $this->input->post('product_id');
            $data['prod_info'] = $this->products_model->get_prod_for_edit($product_id);
            echo json_encode($data['prod_info']);
        }
}
?>