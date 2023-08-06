<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
       $this->load->model('Purchase_model');
       $this->load->model('add_details_model');
       $this->load->model('Product_model');
    }

    public function create_purchase_bill() {
    // Check if the form is submitted
    if ($this->input->post()) {
        $product_data =array();
        // Get the form data
        $product_data['date'] = $this->input->post('date');
        $product_data['product_id'] = $this->input->post('product');
        $product_data['seller_id'] = $this->input->post('seller');
        $product_data['purchaser_id'] = $this->input->post('purchaser');
        $product_data['rate'] = $this->input->post('rate');
        $product_data['qty'] = $this->input->post('qty');
        $product_data['gst'] = $this->input->post('gst');

        // Calculate total amount based on rate and quantity
        $product_data['total'] = $this->input->post('total');
        $table_name ='purchase_bills';
        $this->Purchase_model->create_purchase_bill($product_data,$table_name);
        // Save the purchase bill information to the database
        // Your code to interact with the database and save the data

        // Optionally, you can redirect to a success page after saving the purchase bill
        redirect('Purchase_controller/create_purchase_bill');
    } else {
        $data['action_url'] ='Purchase_controller/create_purchase_bill';
        $data['seller_lable'] ='seller';
        $data['purchase_lable'] ='Purchase';
        $data['products'] = $this->Product_model->get_product();
        $data['sellers'] = $this->add_details_model->get_seller();
        $data['purchasers'] = $this->add_details_model->get_purchaser();
         $this->load->view('header');
        $this->load->view('purchase/create_purchase_bill',$data);
    }
}
public function create_sales_bill() {
    // Check if the form is submitted
    if ($this->input->post()) {
        $product_data =array();
        // Get the form data
        $product_data['date'] = $this->input->post('date');
        $product_data['product_id'] = $this->input->post('product');
        $product_data['customer_id'] = $this->input->post('seller');
        $product_data['purchaser_id'] = $this->input->post('purchaser');
        $product_data['rate'] = $this->input->post('rate');
        $product_data['qty'] = $this->input->post('qty');
        $product_data['gst'] = $this->input->post('gst');

        // Calculate total amount based on rate and quantity
        $product_data['total'] = $this->input->post('total');
        $table_name ='sale_bills';
        $this->Purchase_model->create_purchase_bill($product_data,$table_name);
        // Save the purchase bill information to the database
        // Your code to interact with the database and save the data

        // Optionally, you can redirect to a success page after saving the purchase bill
        redirect('Purchase_controller/create_sales_bill');
    } else {
        $data['action_url'] ='Purchase_controller/create_sales_bill';
        $data['seller_lable'] ='Customers';
        $data['purchase_lable'] ='Sale';
        $data['products'] = $this->Product_model->get_product();
        $data['sellers'] = $this->add_details_model->get_customer();
        $data['purchasers'] = $this->add_details_model->get_purchaser();
        $this->load->view('header');
        $this->load->view('purchase/create_purchase_bill',$data);
    }
}
public function get_gst_rate_ajax() {
    $product_id = $this->input->post('product_id');
    $gst_rate = $this->Product_model->get_product($product_id);
    echo $gst_rate->gst_rate; // Send the GST rate back to the client-side
}

}