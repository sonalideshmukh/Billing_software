
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   // Product_controller.php

class Product extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }
    public function index() {
        $data['product'] = $this->Product_model->get_product();
    	$this->load->view('header');
        $this->load->view('product/product_create',$data);
    }
    public function create_product() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form submission
            $product_data = array(
                'product_name' => $this->input->post('product_name'),
                'product_code' => $this->input->post('product_code'),
                'gst_rate' => $this->input->post('gst_rate'),
            );
            //print_r($product_data);exit;
            $this->Product_model->create_product($product_data);
             redirect('product/create_product');
            // Redirect or show success message
        } else {
        	$data['product'] = $this->Product_model->get_product();
            $this->load->view('header');
 			$this->load->view('product/product_create',$data);
        }
    }
}

?>
