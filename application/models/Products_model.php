<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Products_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		}
		
	
	    function add_prod(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());

			$insert_data= array(
					'category_id' => $this->input->post('category_id'),
					'product_title' => $this->input->post('product_title'),
					'product_status' => $this->input->post('product_status'),
					'product_doc' => $date,
					'product_created_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_product_info',$insert_data)){
				$data['status'] = 'success';
			}
			else{
				$data['status'] = 'error';
				
			}
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
    }

?>