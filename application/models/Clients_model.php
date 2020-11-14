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
          
          function get_clients(){
			$query= $this->db->select('*')
							->from('tbl_client_info')
							->join('tbl_product_info','tbl_client_info.product_id = tbl_product_info.product_id','left')
							//->where('')
							->get();
				
			$data = $query->result_array();
			return $data;
		}


		function get_client_for_edit($client_id){
			$query= $this->db->select('*')
							->from('tbl_client_info')
							->where('tbl_client_info.client_id',$client_id)
							->get();
			$data = $query->row_array();
			return $data;
		}

		function edit_cli(){
						
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());

			$cli_id = $this->input->post('client_id');
			$data = array(
				'product_id' => $this->input->post('product_id'),
				'clientName' => $this->input->post('clientName'),
				'companyName' => $this->input->post('companyName'),
				'clientAddress' => $this->input->post('clientAddress'),
				'clientMobileNo' => $this->input->post('clientMobileNo'),
				'clientEmailAddress' => $this->input->post('clientEmailAddress'),
				'client_info_doc' => $date,
				'client_info_created_by' => $this->session->userdata('user_id')
				);

			$this->db->where('client_id', $cli_id);
			//$this->db->update('tbl_client_info', $data); 	

			$result = $this->db->update('tbl_client_info', $data);

			return $result;
			
		}
        
    }

?>