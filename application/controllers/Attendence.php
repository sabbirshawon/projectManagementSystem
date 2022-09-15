<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendence extends CI_Controller{
  function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('user_id')){
       redirect('login');
     }
  
  }
  
  
   
  public function index()
  {
    $data['title'] = "Attendence";
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
   
    $data['service_alerm'] = $this->login_model->get_service_alarm();

    $data['user_data']= $this->profile_model->get_all_profile();

    // print_r($data['user_data']);

    $data['attn_info'] = $this->attendence_model->get_attn();

    $data['attn_info_check'] = $this->attendence_model->get_attn_check();

    //print_r($data['attn_info_check']);


    $this->load->view('backend/layouts/header',$data);
    $this->load->view('backend/attendence_view',$data);
    $this->load->view('backend/layouts/footer');
  }


  function add_clockin(){
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();
    $this->attendence_model->add_clockin();
    redirect('Attendence');

  }

   function add_clockout(){
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();

    $this->attendence_model->add_clockout();
    redirect('Attendence');

  }


  
}
?>
