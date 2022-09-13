<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_users
   	function login($email, $password){
			$this->db->where("user_email", $email);
			$this->db->where("user_password", $password);
			//$this->db->where("user_type", $type);

			$query = $this->db->get("tbl_users");
			if($query->num_rows()>0){
			
				foreach($query->result() as $rows){
				
					//add all data to session
					$newdata = array(
						'user_id'  => $rows->user_id,
						'user_name'  => $rows->user_name,
						'user_email'  => $rows->user_email,
						'user_type'  => $rows->user_type,
						'user_status'    => $rows->user_status,
						'logged_in'  => TRUE
					);
				}
				
				$this->session->set_userdata($newdata);
				return true;
			}
			else{
				return false;
			}
			
		} 
		
	 function get_total_notification(){
		 $user_id = $this->session->userdata('user_id');
		 //echo $user_id;
		 $this->db->from('notification_info,tbl_users');
		 $this->db->where('tbl_users.user_id = notification_info.user_id');
		 $this->db->where('tbl_users.user_id',$user_id );
		 $this->db->where('notification_info.readingStatus',0);
		 $query = $this->db->get();
		 return $query-> num_rows();
	 }
	 
	 function get_total_alarm(){
		 
		 date_default_timezone_set('Asia/Dhaka');
		 $date = date('Y-m-d',time());
		 
		 $data2 = date_create($date);
		 $data2 = date_add($data2, date_interval_create_from_date_string('15 days'));
		 $data2 = date_format($data2, 'Y-m-d');

		 $user_id = $this->session->userdata('user_id');
		 //echo $user_id;
		 $this->db->from('tbl_domain_hosting');
		 $this->db->where('domain_hosting_exp_date >= "'.$date.'" ' );
		 $this->db->where('domain_hosting_exp_date <= "'.$data2.'" ' );
		 $query = $this->db->get();
		 return $query-> num_rows();
	 }
	 
	 
	 function get_service_alarm(){
		 
		 date_default_timezone_set('Asia/Dhaka');
		 $date = date('Y-m-d',time());
		 
		 $data2 = date_create($date);
		 $data2 = date_add($data2, date_interval_create_from_date_string('3 days'));
		 $data2 = date_format($data2, 'Y-m-d');

		 $user_id = $this->session->userdata('user_id');
		 //echo $user_id;
		 $this->db->from('tbl_client_service');
		 $this->db->where('service_date >= "'.$date.'" ' );
		 $this->db->where('service_date <= "'.$data2.'" ' );
		 $query = $this->db->get();
		 return $query-> num_rows();
	 }
	 
	 
	function get_notification_details(){
		 $user_id = $this->session->userdata('user_id');
		 $this->db->where('notification_info.user_id',$user_id );
		 $this->db->where('notification_info.readingStatus',0);
		 $query = $this->db->get('notification_info');
		 return $query;
	 }
}
?>