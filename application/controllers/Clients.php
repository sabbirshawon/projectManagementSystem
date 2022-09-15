<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
    }
  
    public function index() { 
        $data['title'] = "Clients";
        $data['prod_info'] = $this->products_model->get_products();
        $data['clients_info'] = $this->clients_model->get_clients();
        $this->load->view('backend/layouts/header',$data);
        $this->load->view('backend/clients_view',$data);
        $this->load->view('backend/layouts/footer');
    }

    function add_client(){
        $this->clients_model->add_client();
        redirect('clients');
    }

    function get_cli_info_for_edit(){
        $client_id = $this->input->post('client_id');
        $data['cli_info'] = $this->clients_model->get_client_for_edit($client_id);
        echo json_encode($data['cli_info']);
    }


    function edit_client(){
        $data['edit_cli'] = $this->clients_model->edit_cli();
        redirect('clients');
      }
}
?>