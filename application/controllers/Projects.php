<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller{
  function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('user_id')){
       redirect('login');
     }
  
  }
  
  
   
  public function index()
  {
    $data['title'] = "Projects";
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();

    $data['user_data']= $this->profile_model->get_all_profile();

    $data['project_info'] = $this->projects_model->get_specific_project_info_for_admin();


    $this->load->view('backend/layouts/header',$data);
    $this->load->view('backend/projects_view',$data);
    $this->load->view('backend/layouts/footer');
  }


  public function myprojects()
  {
    $data['title'] = "Projects";
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();

    $data['user_data']= $this->profile_model->get_all_profile();

    $data['project_info'] = $this->projects_model->get_specific_project_info_for_dev();

    //print_r($data['project_info']);
    
    $this->load->view('backend/layouts/header',$data);
    $this->load->view('backend/projects_view',$data);
    $this->load->view('backend/layouts/footer');
  }



 function get_p_info_for_edit(){
      $data['total_notification'] = $this->login_model->get_total_notification();
      $data['total_alerm'] = $this->login_model->get_total_alarm();
      $data['service_alerm'] = $this->login_model->get_service_alarm();
      $project_id = $this->input->post('project_id');
      $data['p_info'] = $this->projects_model->get_project_for_edit($project_id);

      
      echo json_encode($data['p_info']);
    }


  function edit_p(){
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();

    $this->projects_model->edit_p();

    redirect('Projects');
  }



  
}
?>
