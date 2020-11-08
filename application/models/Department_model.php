<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

    function add_dept(){
        $insert_data= array(
                    'deptName' => $this->input->post('deptName'),
                    'deptStatus' => $this->input->post('deptStatus'),
                    'dept_created_by' => $this->session->userdata('user_id')
                    );
        if($this->db->insert('department_info',$insert_data)){
            print_r('Designation added');
			}
			else{
				print_r('Designation not added');
				
			}
        
	}
	
	function add_designation(){
		$insert_data= array(
					'deptID' => $this->input->post('deptID'),
					'designationName' => $this->input->post('designationName'),
					'desgStatus' => $this->input->post('desgStatus'),
					'desg_created_by' => $this->session->userdata('user_id')
					);
		if($this->db->insert('designation_info',$insert_data)){
			$data['status'] = 'success';
		}
		else{
			$data['status'] = 'error';
			
		}
		
	}

    function get_department_info(){
		$query= $this->db->select('*')
						->from('department_info')
						->get();
		$data = $query->result_array();
		return $data;
	}

	function get_deptt(){
		$query= $this->db->select('*')
									->from('department_info')
									->get();
		$data = $query->result();
		$row[''] = 'Select A Department';
		if(count($data) > 0){
			foreach($data as $field){
				$row[$field->deptID] = $field->deptName;
			}
		}
		return $row;
	}

	function get_department_for_edit($dept_id){
		$query= $this->db->select('*')
									->from('department_info')
									->where('department_info.deptID',$dept_id)
									->get();
		$data = $query->row_array();
		//print_r($data);
		return $data;
	}

	function edit_dept(){
		$deptID = $this->input->post('deptID');
		$data = array(
			   'deptName' =>  $this->input->post('deptName'),
			   'deptStatus' => $this->input->post('deptStatus')
			);

		$this->db->where('deptID', $deptID);
		$this->db->update('department_info', $data); 	
	}


	
	function get_designation_info(){
		$query= $this->db->select('*')
						->from('department_info,designation_info')
						->where('department_info.deptID = designation_info.deptID')
						->get();
		$data = $query->result_array();
		return $data;
	}

	function get_designation(){
		$query= $this->db->select('*')
									->from('designation_info')
									->get();
		$data = $query->result();
		$row[''] = 'Select A Designation';
		if(count($data) > 0){
			foreach($data as $field){
				$row[$field->designationID] = $field->designationName;
				//print_r($row[$field->designationID] ." ");
			}
		}
		return $row;
			
	}

	function get_desg_for_edit($desg_id){
		$query= $this->db->select('*')
									->from('department_info,designation_info')
									->where('department_info.deptID = designation_info.deptID')
									->where('designation_info.designationID',$desg_id)
									->get();
		$data = $query->row_array();
		return $data;
	}

	function edit_desg(){
		$desgID = $this->input->post('designationID');
		$data = array(
			   'deptID' =>  $this->input->post('deptID'),
			   'designationName' =>  $this->input->post('designationName'),
			   'desgStatus' => $this->input->post('desgStatus')
			);

		$this->db->where('designationID', $desgID);
		$this->db->update('designation_info', $data); 	
		
	}


	function add_employee(){

		date_default_timezone_set('Asia/Dhaka');
		$user_doc = date('Y-m-d',time());
		print_r($this->input->post('user_type'));

		$insert_data= array(
					'e_name' => $this->input->post('e_name'),
					'user_email' => $this->input->post('user_email'),
					'user_password' => md5($this->input->post('user_password')),
					'user_type' => $this->input->post('user_type'),
					'e_joined_date' => $this->input->post('e_joined_date'),
					'deptID' => $this->input->post('deptID'),
					'designationID' => $this->input->post('designationID'),
					'user_status' => 1,
					'user_doc' => $user_doc,
					'created_by' => $this->session->userdata('user_id')
					);
		if($this->db->insert('tbl_users',$insert_data)){
			//print_r('Designation added');
			$data['status'] = 'success';
		}
		else{
			//print_r('Designation not added');
			$data['status'] = 'error';
			
		}
			
	}

	function get_employee_info(){
		$query= $this->db->select('*')
					->from('tbl_users,designation_info,department_info')
					->where('designation_info.designationID = tbl_users.designationID')
					->where('department_info.deptID = tbl_users.deptID')
					->where('designation_info.designationID = tbl_users.designationID')
					->get();
		
		$data = $query->result_array();
		return $data;

	}

}
?>