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

    function get_dept_desg(){

        $deptID = $this->input->post('deptID');
        $query = $this->department_model->get_dept_to_desg($deptID);
        $json_response = array();
        foreach($query->result() as $row){
          $row_array['designationName'] = $row-> designationName;
          $row_array['designationID'] = $row-> designationID;
          array_push($json_response,$row_array);
        }
        
        echo json_encode($json_response);
    }


}
?>