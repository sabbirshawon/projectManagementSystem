<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index(){
        print_r("dashboard");
    }
}
?>