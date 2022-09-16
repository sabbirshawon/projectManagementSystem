<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign_project extends CI_Controller{
  function __construct(){
    parent:: __construct();
    if(!$this->session->userdata('user_id')){
       redirect('login');
     }
  
  }
  
  
   
  public function index()
  {
    $data['title'] = "Assign Project Page";
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();

    $data['client_info'] = $this->projects_model->get_clients();
    $data['pro_cat_info'] = $this->projects_model->get_category();
    $data['pro_info'] = $this->projects_model->get_product();
    $data['pac_info'] = $this->projects_model->get_package();
    $data['em_info'] = $this->projects_model->get_employee();


     $data['user_data']= $this->profile_model->get_all_profile();


    $this->load->view('backend/layouts/header',$data);
    $this->load->view('backend/project_assign_view',$data);
    $this->load->view('backend/layouts/footer');
  }



     function get_clients()
    {
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();
    $clients = $this->projects_model->get_clients();
    echo json_encode($clients);
  } 
  

  
   function add_projects(){
    $data['total_notification'] = $this->login_model->get_total_notification();
    $data['total_alerm'] = $this->login_model->get_total_alarm();
    $data['service_alerm'] = $this->login_model->get_service_alarm();

    $this->projects_model->add_projects();
    
    redirect('Assign_project');

    }
  
    function get_cat_prod(){
      $data['total_notification'] = $this->login_model->get_total_notification();
      $data['total_alerm'] = $this->login_model->get_total_alarm();
      $data['service_alerm'] = $this->login_model->get_service_alarm();
      $category_id = $this->input->post('category_id');
      $query = $this -> projects_model -> get_category_product($category_id);
      $json_response = array();
      foreach($query->result() as $row){
        $row_array['product_title'] = $row-> product_title;
        $row_array['product_id'] = $row-> product_id;
        array_push($json_response,$row_array);
      }
      
      echo json_encode($json_response);
    }
  
    function get_prod_pack()
    {
      $data['total_notification'] = $this->login_model->get_total_notification();
      $data['total_alerm'] = $this->login_model->get_total_alarm();
      $data['service_alerm'] = $this->login_model->get_service_alarm();
      $product_id = $this->input->post('product_id');
      $query = $this -> projects_model -> get_product_package($product_id);
      $json_response = array();
      foreach($query->result() as $row){
        $row_array['package_title'] = $row-> package_title;
        $row_array['package_id'] = $row-> package_id;
        array_push($json_response,$row_array);
      }
      
      echo json_encode($json_response);
    }
    
    
    function get_pack_dtails()
    {
      $data['total_notification'] = $this->login_model->get_total_notification();
      $data['total_alerm'] = $this->login_model->get_total_alarm();
      $data['service_alerm'] = $this->login_model->get_service_alarm();
      $package_id = $this->input->post('package_id');
      $query = $this -> projects_model -> get_package_details($package_id);
      $json_response = array();
      foreach($query->result() as $row){
        $row_array['package_feature_details'] = $row-> package_feature_details;
        $row_array['package_feature_details_id'] = $row-> package_feature_details_id;
        array_push($json_response,$row_array);
      }
      
      echo json_encode($json_response);
    }





    function add_addi_req(){
    $id = $this->projects_model->add_addi_req();
    echo json_encode(array('pro_id'=>$id));
  }
  function add_addi_req2(){
    $id = $this->projects_model->add_addi_req22();
    echo json_encode(array('pro_id'=>$id));
  }
  
   function get_project_add_req(){
    $pro_id = $this->input->post('pro_id');
    $data = $this->projects_model->get_addi_req($pro_id);
    
    //print_r($data->result());
    $json = array();
    foreach($data->result() as $field){
      $row_array['req_name'] = $field->req_name;
      $row_array['additional_requirement_id'] = $field->additional_requirement_id;
      array_push( $json,$row_array );
    }
    
    echo json_encode($json);
  } 
  
  
  //delete requirement start
  
  function del_addi_req(){
    $del_id = $this->input->post('del_id');
    $id = $this->projects_model->del_addi_req($del_id);
    echo json_encode(array('pro_id'=>$id));
  }







  
}
?>
