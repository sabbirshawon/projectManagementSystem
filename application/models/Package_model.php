<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Package_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
        }

        function add_package()
        {
		
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());
			
			$insert_data= array(
					'product_id' => $this->input->post('product_id'),
					'package_title' => $this->input->post('package_title'),
					'package_status' => $this->input->post('package_status'),
					'package_doc' => $date,
					'package_created_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_package_info',$insert_data)){
				$data['status'] = 'success';
			}
			else{
				$data['status'] = 'error';
			}
        }
        
        function get_package(){
			$query= $this->db->select('*')
							->from('tbl_package_info')
							->join('tbl_product_info','tbl_package_info.product_id = tbl_product_info.product_id','left')
							->get();
			$data = $query->result_array();
			return $data;
		}
		
	}

?>