<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     function login($email, $password){
        //print_r($email." ". $password);
        //$this->db->where("user_type", $type);

        $this->db->where("user_email", $email);
		$this->db->where("user_password", $password);
        $query = $this->db->get("tbl_users");
        
        if($query->num_rows()>0)
		{
            print_r("Data available");
		}
        else
        {
			print_r("Data not available");
		}


     }

}
?>