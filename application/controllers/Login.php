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
        $result=$this->login_model->login($email, $password);
        
        if($result AND ($this->session->userdata('user_status')==1)){
            redirect('dashboard');
        }
        else{
            if($this->session->userdata('user_status')==1)
            {
                print_r("Destroying session");
                $newdata = array( 
                    'user_id'  => '',
                    'user_type'  => '',
                    'user_name'  => '',
                    'user_email'    => '',
                    'user_status'    => '',
                    'logged_in'  => FALSE
                );    
                $this->session->unset_userdata($newdata);
			    $this->session->sess_destroy();
            }
            else{
                $data = array();
                if($this->input->post()){
                    $data['message'] = 'Wrong Email or Password!';
                }else{
                    $data['message'] = 'Sign in to start your session';
                }
                
                $this->load->view('frontend/login', $data);
            }
        }
        
    }
}
?>