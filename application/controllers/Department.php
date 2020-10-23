<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index(){
        //print_r('Department');

        $data['title'] = "Department";
        $data['department_info'] = $this->department_model->get_department_info();
        $data['designation_info'] = $this->department_model->get_designation_info();
        $data['deptt_info'] = $this->department_model->get_deptt();
        $this->load->view('backend/layouts/header',$data);
        $this->load->view('backend/department_view',$data);
        $this->load->view('backend/layouts/footer');
    }

    function add_dept(){
        $this->department_model->add_dept();
        redirect('department');
      }
}
?>