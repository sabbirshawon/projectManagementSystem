<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendence extends CI_Controller{
  function __construct(){
    parent:: __construct();
   }
  
  
   
  public function index()
  {
    $data['title'] = "Attendence";
    $this->load->view('backend/layouts/header',$data);
    $this->load->view('backend/attendence_view',$data);
    $this->load->view('backend/layouts/footer');
  }

    function add_clockin(){
        $this->attendence_model->add_clockin();
        redirect('Attendence');
    }
}
?>
