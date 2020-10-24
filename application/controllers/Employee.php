<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index() { 

        $data['title'] = "Employee";
        $data['deptt_info'] = $this->department_model->get_deptt();
        $data['desg_info'] = $this->department_model->get_designation();
        $data['employee_info'] = $this->department_model->get_employee_info();

        $this->load->view('backend/layouts/header');
        $this->load->view('backend/employee_view',$data);
        $this->load->view('backend/layouts/footer');
    }

    function add_emp(){
        $this->department_model->add_employee();
        redirect('employee');
    }
}
?>