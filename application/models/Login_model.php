<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     function login($email, $password) {
        
        $this->db->where("user_email", $email);
		$this->db->where("user_password", $password);
        $query = $this->db->get("tbl_users");
        
        if($query->num_rows()>0) {
			
            foreach($query->result() as $rows) {
                //print_r("User name: " .$rows->user_name ." User Email: ".$rows->user_email );
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
            //print_r("data is stored on session");
        }
        else {
            return false;
            //print_r("data is not avialble");
        }
    }

}
?>