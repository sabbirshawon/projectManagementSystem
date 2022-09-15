<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Profile_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		}
		
		function get_users_profile(){
			
			$query= $this->db->select('*')
						->from('tbl_users,designation_info,department_info')
						->where('tbl_users.designationID = designation_info.designationID')
						->where('tbl_users.deptID = department_info.deptID')
						->where('tbl_users.user_id',$this->session->userdata('user_id'))
						->get();
			$data = $query->result_array();
			return $data;
		}




		function get_all_profile(){
			
			$query= $this->db->select('*')
						->from('tbl_users')
						->where('tbl_users.user_id',$this->session->userdata('user_id'))
						->get();
			$data = $query->result_array();
			return $data;
		}



		function editProfile(){
			$userID = $this->session->userdata('user_id');
			$insert_data= array(
					'e_name' => $this->input->post('e_name'),
					'e_dob' => $this->input->post('e_dob'),
					'e_photo' => $this->input->post('e_photo'),
					'e_location' => $this->input->post('e_location'),
					'e_bio' => $this->input->post('e_bio'),
					'e_edu' => $this->input->post('e_edu')
					);
			$this->db->where('user_id', $userID);
			$this->db->update('tbl_users', $insert_data); 

			$this->db->where('tbl_users.user_id',$user_id);
			$query = $this->db->get('tbl_users');
			$row = $query->row_array();
			header("Content-Type: text/plain");
				
				foreach ( $this->input->post('e_skils') as $e_skils){

					$insert_data2= array(
					'e_skils' => $e_skils
					
					);
						
					$this->db->update('tbl_users',$insert_data2);	
				}

			return $userID;
		}




		function get_profile($userID){
			$query= $this->db->select('*')
							->from('tbl_users')
							->where('tbl_users.user_id',$userID)
							->get();
			$data = $query->row_array();
			return $data;
		}
		
		
	}

?>