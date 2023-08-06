<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_details_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Add_details_model');
    }
    public function add_seller() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form submission
            $product_data = array(
                'name' => $this->input->post('name'),
                'gstin' => $this->input->post('gstin'),
                'address' => $this->input->post('address'),
            );
            //print_r($product_data);exit;
            $this->Add_details_model->add_seller($product_data);
             redirect('add_details_controller/add_seller');
            // Redirect or show success message
        } else {
            $data['page_name']='Seller';
            $data['action_url']='add_details_controller/add_seller';
            $data['seller'] = $this->Add_details_model->get_seller();
            $this->load->view('header');
            $this->load->view('users/add_seller_view',$data);
        }
    }

    public function add_purchaser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form submission
            $product_data = array(
                'name' => $this->input->post('name'),
                'gstin' => $this->input->post('gstin'),
                'address' => $this->input->post('address'),
            );
            //print_r($product_data);exit;
            $this->Add_details_model->add_purchaser($product_data);
             redirect('add_details_controller/add_purchaser');
            // Redirect or show success message
        } else {
            $data['page_name']='Purchaser';
            $data['action_url']='add_details_controller/add_purchaser';
            $data['seller'] = $this->Add_details_model->get_purchaser();
            $this->load->view('header');
            $this->load->view('users/add_seller_view',$data);
        }
    }

    public function add_customer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form submission
            $product_data = array(
                'name' => $this->input->post('name'),
                'gstin' => $this->input->post('gstin'),
                'address' => $this->input->post('address'),
            );
            //print_r($product_data);exit;
            $this->Add_details_model->add_customer($product_data);
             redirect('add_details_controller/add_customer');
            // Redirect or show success message
        } else {
            $data['page_name']='Customer';
            $data['action_url']='add_details_controller/add_customer';
            $data['seller'] = $this->Add_details_model->get_customer();
            $this->load->view('header');
            $this->load->view('users/add_seller_view',$data);
        }
    }
}
?>
