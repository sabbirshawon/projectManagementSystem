<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Category_model extends CI_Model {
		function __construct(){
          // Call the Model constructor
          parent::__construct();
		}
		
	    function add_cat(){
			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());

			$insert_data= array(
					'category_title' => $this->input->post('category_title'),
					'category_status' => $this->input->post('category_status'),
					'category_doc' => $date,
					'category_created_by' => $this->session->userdata('user_id')
						);
			if($this->db->insert('tbl_category_info',$insert_data)){
                print_r('Category added');
				$data['status'] = 'success';
			}
			else{
                print_r('Category not added');
				$data['status'] = 'error';
				
			}
        }
        
        function get_category(){
            $query= $this->db->select('*')
                            ->from('tbl_category_info')
                            ->get();
            $data = $query->result_array();
            return $data;
        }

        function get_cat_for_edit($category_id){
			$query= $this->db->select('*')
							->from('tbl_category_info')
							->where('tbl_category_info.category_id',$category_id)
							->get();
			$data = $query->row_array();
			return $data;
		}


		function edit_cat(){

			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d',time());

			$category_id = $this->input->post('category_id');
			$data = array(
				'category_title' => $this->input->post('category_title'),
				'category_status' => $this->input->post('category_status'),
				'category_created_by' => $this->session->userdata('user_id')
				);

			$this->db->where('category_id', $category_id);

			$result = $this->db->update('tbl_category_info', $data);

			return $result;
			
		}
    }

?>