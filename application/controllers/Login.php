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
        //$this->load->view('frontend/login');
        print_r("email " .$email);
        //$this->load->view('frontend/login');
        
    }
}
?>