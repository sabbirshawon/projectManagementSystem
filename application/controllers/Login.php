<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index(){
        //print_r("login");
        $email = $this->input->post('user_email');
        $password = md5($this->input->post('user_password'));
        $this->login_model->login($email, $password);
        
        //print_r("size of string is " . strlen($email));
        //print_r(" " . $email);
       
        if (isset($email) && $email !== '') 
        {
            //redirect('Dashboard');
        }else{
            $this->load->view('frontend/login');
        }
        
        
        //$this->load->view('frontend/login');
        
    }
}
?>