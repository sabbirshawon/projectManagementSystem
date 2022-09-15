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

    function edit_cat(){
        $data['edit_cat'] = $this->category_model->edit_cat();
        redirect('category');
      }
    
    
        function get_cat_info_for_edit(){
            $category_id = $this->input->post('category_id');
            $data['cate_info'] = $this->category_model->get_cat_for_edit($category_id);
            echo json_encode($data['cate_info']);
        }
}
?>