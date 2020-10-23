<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index(){
        //print_r('Department');
        $this->load->view('backend/layouts/header');
        $this->load->view('backend/department_view');
        $this->load->view('backend/layouts/footer');
    }

    function add_dept(){
        $this->department_model->add_dept();
        //redirect('department');
      }
}
?>