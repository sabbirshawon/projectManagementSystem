<?php 
   class Test extends CI_Controller {
  
      public function index() { 
         $this->load->view('frontend/login'); 
      }
      
      public function hello() { 
        echo "This is hello function."; 
     } 
   } 
?>