<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   class Projects extends CI_Controller{
      function __construct()
      {
         parent:: __construct();
      }
  
      public function index() { 
         $this->load->view('frontend/login'); 
      }

      public function hello() { 
         echo "This is hello function."; 
      } 
}
?>
