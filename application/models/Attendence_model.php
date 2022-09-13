<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Attendence_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		}
		

		function get_attn(){
			$query= $this->db->select('*')
							->from('tbl_attendence,tbl_users')
							->where('tbl_attendence.attn_by = tbl_users.user_id')
							->where('tbl_users.user_id',$this->session->userdata('user_id'))
							->get();
				
				$data = $query->result_array();
				return $data;
			}


		function get_attn_check(){


			$today = date('Y-m-d');


			$query= $this->db->select('*')
							->from('tbl_attendence,tbl_users')
							->where('tbl_attendence.attn_by = tbl_users.user_id')
							->where('tbl_attendence.clock_date',$today)
							->where('tbl_users.user_id',$this->session->userdata('user_id'))
							->get();
				
				$data = $query->result_array();
				return $data;
			}
		
		function add_clockin(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d H:i:s',time());

			$date2 = date('Y-m-d',time());

			$insert_data= array(
						'clock_in' => $date,
						'clock_date' => $date2,
						'attn_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_attendence',$insert_data)){
				$data['status'] = 'success';
			}
			else{
				$data['status'] = 'error';
				
			}
		} 



			function add_clockout(){
						
				date_default_timezone_set('Asia/Dhaka');
				$date = date('Y-m-d H:i:s',time());

				$a_id = $this->input->post('a_id');

				$insert_data= array(
						'clock_out' => $date
						);

				$this->db->where('a_id', $a_id);

				$result = $this->db->update('tbl_attendence', $insert_data);

				return $result;
				
			}
		
	}

?>