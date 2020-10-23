<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

    function add_dept(){
        $insert_data= array(
                    'deptName' => $this->input->post('deptName'),
                    'deptStatus' => $this->input->post('deptStatus'),
                    'dept_created_by' => $this->session->userdata('user_id')
                    );
        if($this->db->insert('department_info',$insert_data)){
            print_r('dept added');
			}
			else{
				print_r('dept not asses added');
				
			}
        
    }

    function get_department_info(){
		$query= $this->db->select('*')
						->from('department_info')
						->get();
		$data = $query->result_array();
		return $data;
	}

	function get_deptt(){
		$query= $this->db->select('*')
									->from('department_info')
									->get();
		$data = $query->result();
		$row[''] = 'Select A Department';
		if(count($data) > 0){
			foreach($data as $field){
				$row[$field->deptID] = $field->deptName;
			}
		}
		return $row;
	}
	
	function get_designation_info(){
		$query= $this->db->select('*')
						->from('department_info,designation_info')
						->where('department_info.deptID = designation_info.deptID')
						->get();
		$data = $query->result_array();
		return $data;
	}

}
?>