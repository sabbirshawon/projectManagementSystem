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
                print_r("User name: " .$rows->user_name ." User Email: ".$rows->user_email );
            }
        }
        else {
            print_r("data is not avialble");
        }
    }

}
?>