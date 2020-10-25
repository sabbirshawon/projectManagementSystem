<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Clients_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
          }
          


          function add_client(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			$insert_data= array(
						'product_id' => $this->input->post('product_id'),
						'clientName' => $this->input->post('clientName'),
						'companyName' => $this->input->post('companyName'),
						'clientAddress' => $this->input->post('clientAddress'),
						'clientMobileNo' => $this->input->post('clientMobileNo'),
						'clientEmailAddress' => $this->input->post('clientEmailAddress'),
						'client_info_doc' => $date,
						'client_info_created_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_client_info',$insert_data)){
				$data['status'] = 'success';
			}
			else{
				$data['status'] = 'error';
				
			}
		} 
        
    }

?>