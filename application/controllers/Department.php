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

      function get_dept_info_for_edit(){
        $dept_id = $this->input->post('dept_id');
        $data['dept_info'] = $this->department_model->get_department_for_edit($dept_id);
        echo json_encode($data['dept_info']);
      }

      function edit_dept(){
        
        $this->department_model->edit_dept();
        redirect('department');
      }

      function add_designation(){
        
        $this->department_model->add_designation();
        redirect('department');
      }

      function edit_desg(){
        $this->department_model->edit_desg();
        //redirect('department');
      }
    
    
       function get_desg_info_for_edit(){
        $desg_id = $this->input->post('designationID');
        $data['desg_info'] = $this->department_model->get_desg_for_edit($desg_id);
        echo json_encode($data['desg_info']);
        print_r($data['desg_info']);
      }
}
?>