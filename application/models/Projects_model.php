<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Projects_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		}
		

	
	function get_specific_project_info_for_admin($project_id=''){
		$this->db->select('*,tbl_project_info.project_id');
		$this->db->from('tbl_project_info,tbl_category_info,tbl_product_info');
		$this->db->where('tbl_project_info.category_id = tbl_category_info.category_id');
		$this->db->where('tbl_project_info.product_id = tbl_product_info.product_id');
		$this->db->join('tbl_users','tbl_users.user_id=tbl_project_info.project_created_by','left');
		$this->db->join('tbl_package_info','tbl_project_info.package_id = tbl_package_info.package_id','left');
		$this->db->group_by('tbl_project_info.project_id');
		if($project_id!=''){$this->db->where('tbl_project_info.project_id',$project_id);}
		$query= $this->db->get();
			if($project_id!=''){
				$data = $query->row_array();
				$data['supervisor_Name'] = $this->get_common_name($data['project_supervisor']);
			}
			else{
			$data = $query->result_array();
			}
			return $data;
	}  


	function get_specific_project_info_for_dev($project_id='')	{
		$this->db->select('*,tbl_project_info.project_id');
		$this->db->from('tbl_project_info,tbl_category_info,tbl_product_info');
		$this->db->where('tbl_project_info.category_id = tbl_category_info.category_id');
		$this->db->where('tbl_project_info.product_id = tbl_product_info.product_id');
		$this->db->where('tbl_project_info.project_status',1);
		$this->db->join('tbl_users','tbl_users.user_id=tbl_project_info.project_created_by','left');
		$this->db->join('tbl_package_info','tbl_project_info.package_id = tbl_package_info.package_id','left');
		$this->db->group_by('tbl_project_info.project_id');
		if($project_id!=''){$this->db->where('tbl_project_info.project_id',$project_id);}
		$query= $this->db->get();
			if($project_id!=''){
				$data = $query->row_array();
				$data['supervisor_Name'] = $this->get_common_name($data['project_supervisor']);
			}
			else{
			$data = $query->result_array();
			}
			return $data;
	} 
	
	function get_common_name($employee_id){
		$this->db->select('e_name');
		$this->db->where('user_id',$employee_id);
		$que = $this->db->get('tbl_project_info');
		$rrow = $que->row_array();
		return $rrow['name'];
	}
	function get_assign($project_id){
		$name = '';
		$this->db->select('employeeinfo.name');
		$this->db->from('tbl_project_developer_assignment,employeeinfo');
		$this->db->where('tbl_project_developer_assignment.user_id = employeeinfo.user_id');
		$this->db->where('project_id', $project_id);
		$query= $this->db->get();
		
		foreach ($query->result() as $row)
		{
				$name .= $row->name.', ';
		}
		return rtrim($name,', ');
		
	}
	
	
	function get_project_dtails_info($project_id){
		$query= $this->db->select('*')
					->from('tbl_project_requirement_details')
					->where('tbl_project_requirement_details.project_id',$project_id)
					->get();
			
			$data = $query->result_array();
			return $data;
		}
	
	
	function get_package_dtails_info($package_id){
		$query= $this->db->select('*')
					->from('tbl_package_feature_details')
					->where('tbl_package_feature_details.package_id',$package_id)
					->get();
			
			$data = $query->result_array();
			return $data;
		}
		
		
	function add_projects(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$insert_data= array(
						'project_title' => $this->input->post('project_title'),
						'project_receive_date' => $this->input->post('project_receive_date'),
						'project_deadline' => $this->input->post('project_deadline'),
						'project_dev_deadline' => $this->input->post('project_dev_deadline'),
						'category_id' => $this->input->post('category_id'),
						'product_id' => $this->input->post('product_id'),
						'package_id' => $this->input->post('package_id'),
						'project_supervisor' => $this->input->post('Supervisor'),
						'project_doc' => $date,
						'project_created_by' => $this->session->userdata('user_id')
						
						);
			if($this->db->insert('tbl_project_info',$insert_data)){
				$data['status'] = 'success';
				$project_id = $this->db->insert_id();
				$this->db->where('temp_additional_requirement.project_id',$project_id);
				$query = $this->db->get('temp_additional_requirement');
				foreach ($query -> result() as $field){
					
					$project_requirement_details_status=1;

					$insert_data2= array(
					'project_id' => $project_id,
					'project_requirement_details' => $field->req_name,
					'project_requirement_details_status' => $project_requirement_details_status,
					'project_requirement_doc' => $date,
					'project_requirement_created_by' => $this->session->userdata('user_id')
					
					);
					$this->db->insert('tbl_project_requirement_details',$insert_data2);
				}
				$this->db->truncate('temp_additional_requirement');
				
			

				$this->db->where('tbl_project_info.project_id',$project_id);
				$query = $this->db->get('tbl_project_info');
				$row = $query->row_array();
				header("Content-Type: text/plain");
				
				foreach ( $this->input->post('developerID') as $developerID){

					$insert_data2= array(
					'user_id' => $developerID,
					'project_id' => $project_id,
					'project_dev_assigment_doc' => $date,
					'project_dev_assignment_created_by' => $this->session->userdata('user_id')
					
					);
					
					$insert_data3= array(
					'user_id' => $developerID,
					'project_id' => $project_id,
					'readingStatus' => 0,
					'notificationDoc' => $date,
					'notificationCreator' => $this->session->userdata('user_id'),
					'notificationDetails' => 'You have assigned to a new project.<br />Project Name: '.$row['project_title']
					
					);
					
					$this->db->insert('tbl_project_developer_assignment',$insert_data2);	
					$this->db->insert('notification_info',$insert_data3);	
				}
			 }
			else{
				$data['status'] = 'error';
				
			}
			
		}

		
		function get_clients(){
			$query= $this->db->select('*')
					->from('tbl_client_info')
					->get();
			$data = $query->result();
			
			$row[''] = 'Select A Client';
			if(count($data) > 0){
				foreach($data as $field){
					$row[$field->client_id] = $field->clientName;
				}
			}
			return $row;
			
		} 
		



		function get_category(){
			$query= $this->db->select('*')
										->from('tbl_category_info')
										->get();
			$data = $query->result();
			
			$row[''] = 'Select A Category';
			if(count($data) > 0){
				foreach($data as $field){
					$row[$field->category_id] = $field->category_title;
				}
			}
			return $row;
		}
		
		function get_product(){
			$query= $this->db->select('*')
										->from('tbl_product_info')
										->get();
			$data = $query->result();
			
			$row[''] = 'Select A Product';
			if(count($data) > 0){
				foreach($data as $field){
					$row[$field->product_id] = $field->product_title;
				}
			}
			return $row;
		}
	
		function get_package(){
			$query= $this->db->select('*')
										->from('tbl_package_info')
										->get();
			$data = $query->result();
			
			$row [''] = 'Select a Package';
			if(count($data) > 0){
				foreach($data as $field){
					$row[$field->package_id] = $field->package_title;
				}
			}
			return $row;
				
		}
		
		
		function get_employee(){
			$query= $this->db->select('*')
							->from('tbl_users')
							->where('tbl_users.user_type','Developer')
							->get();
			$data = $query->result();
			
			if(count($data) > 0){
				foreach($data as $field){
					$row[$field->user_id] = $field->e_name;
				}
			}
			return $row;
				
		}
		
		
		
		function get_category_product($cat_select)
		{
				$this -> db -> where('category_id',$cat_select);
				$quer = $this -> db -> get('tbl_product_info');
			return $quer;
		}
		
		function get_product_package($sessin_id)
		{
				$this -> db -> where('product_id',$sessin_id);
				$query = $this -> db -> get('tbl_package_info');
			return $query;
		}
		
		function get_package_details($pack_id)
		{
				$this -> db -> where('package_id',$pack_id);
				$query = $this -> db -> get('tbl_package_feature_details');
			return $query;
		}
		
		
		
	/* 	function get_pck_dtails(){
			$query= $this->db->select('*')
										->from('tbl_package_feature_details')
										->get();
			$data = $query->result();
			
			if(count($data) > 0){
				foreach($data as $field){
					$row[$field->package_feature_details_id] = $field->	package_feature_details;
				}
			}
			return $row;
				
		} */
	
	/*function my_projects($project_id='')	{
		$user_id = $this->session->userdata('id');
		$this->db->select('*,tbl_project_info.project_id');
					$this->db->from('tbl_project_info,tbl_category_info,tbl_client_info,tbl_product_info,tbl_project_developer_assignment,tbl_users');
					$this->db->where('tbl_project_info.category_id = tbl_category_info.category_id');
					$this->db->where('tbl_project_info.client_id = tbl_client_info.client_id');
					$this->db->where('tbl_project_info.product_id = tbl_product_info.product_id');
					$this->db->join('tbl_package_info','tbl_project_info.package_id = tbl_package_info.package_id','left');
					$this->db->join('tbl_project_requirement_details','tbl_project_requirement_details.project_id = tbl_package_info.package_id','left');
					$this->db->where('tbl_users.user_id = tbl_project_developer_assignment.user_id');
					$this->db->where('tbl_users.user_id',$user_id );
					$this->db->where('tbl_project_info.project_id=tbl_project_developer_assignment.project_id');
					if($project_id!=''){$this->db->where('tbl_project_info.project_id',$project_id);}
					$query= $this->db->get();
		if($project_id!=''){
			$data = $query->row_array();
			$data['supervisor_Name'] = $this->get_common_name($data['project_supervisor']);
			$data['reffered_Name'] = $this->get_common_name($data['refferedBy']);
		}
		else{
		$data = $query->result_array();
		}
		return $data;
	}*/
	
 
	/* public function edit_dept(){
		$update_data= array(
			'deptName' => $this->input->post('deptName'),
			'headDeptName' => $this->input->post('headDeptName')
		);
		if($this->db->where('deptID', deptID)->update('department_info', $update_data)){
			$data['status'] ='success';
		}
		else{
			$data['status'] ='error';
		}
		redirect('department');
		
	} */
		
		function add_addi_req(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			
			$this->db->select_max('project_id');
			$que = $this->db->get('tbl_project_info');
			if($que->num_rows() > 0){
				$row = $que->row_array();
			}
			else{
				$row['project_id'] = 0;
			}
			
			
			$data = array(
						'req_name' => $this->input->post('project_requirement_details'),
						'doc' => $date,
						'project_id' => $row['project_id']+1
						);
			$this->db->insert('temp_additional_requirement',$data);
			
			return $row['project_id']+1;
		}
		
		
		function get_addi_req($pro_id){
			$this->db->where('project_id',$pro_id);
			$que = $this->db->get('temp_additional_requirement');
			return $que;
		}
		
		
		//
		
		function add_addi_req22(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$this->db->truncate('temp_additional_requirement');
			
			
			$package_id = $this->input->post('package_id');
			$this->db->where('tbl_package_feature_details.package_id',$package_id);
			$query = $this->db->get('tbl_package_feature_details');
			
			
			$this->db->select_max('project_id');
			$que = $this->db->get('tbl_project_info');
			if($que->num_rows() > 0){
				$row = $que->row_array();
			}
			else{
				$row['project_id'] = 0;
			}
			
			
			
			
			
			foreach ($query -> result() as $field){
				$data = array(
						'req_name' => $field->package_feature_details,
						'doc' => $date,
						'project_id' => $row['project_id']+1
						);
				$this->db->insert('temp_additional_requirement',$data);
			}
		
			return $row['project_id']+1;
		}
		
		function del_addi_req($del_id){

			$this->db->where('additional_requirement_id',$del_id);
			$this->db->delete('temp_additional_requirement');
			
			$this->db->select_max('project_id');
			$que = $this->db->get('tbl_project_info');
			if($que->num_rows() > 0){
				$row = $que->row_array();
			}
			else{
				$row['project_id'] = 0;
			}
			return $row['project_id']+1;
		}
		
		 //edit
		 
		function get_project_for_edit($projects_id){
			$query= $this->db->select('*')
							->from('tbl_project_info')
							->where('tbl_project_info.project_id',$projects_id)
							->get();
			$data = $query->row_array();
			return $data;
		}

	function edit_p(){
						
			$project_id = $this->input->post('project_id');
			$data = array(
				'project_status' => $this->input->post('project_status')
			
				);

			$this->db->where('project_id', $project_id);

			$result = $this->db->update('tbl_project_info', $data);

			return $result;
				
			}

		 
		 
		
	}
?>