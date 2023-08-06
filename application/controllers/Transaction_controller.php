<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load the necessary models and libraries
        $this->load->model('Transaction_model');
         $this->load->model('Product_model');
    }

    public function view_transaction_report() {
        // Get the filter values from the request
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product');
        $type = $this->input->get('type');
        if($from_date == ''){
            $from_date=date('Y-m-d');
        }
        if($to_date == ''){
            $to_date=date('Y-m-d');
        }
        $data['to_date'] =$to_date;
        $data['from_date'] =$from_date;
        $data['products'] = $this->Product_model->get_product();
        $data['types'] = array('1'=>'Purchase','2'=>'Sale');
        // Fetch transaction data based on the filters
        $data['transaction_data'] = $this->Transaction_model->get_transaction_report($from_date, $to_date, $product_id, $type);
        $this->load->view('header');
        $this->load->view('transaction/transaction_report_view', $data);
    }
}
