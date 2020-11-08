<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Attendence_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
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
		
	}

?>