<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Stock_model');
        $this->load->model('Product_model');
    }

    public function view_stock_report() {
       $data['products'] = $this->Product_model->get_product();
         // Get the filter values from the request
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product');
        if($from_date == ''){
            $from_date=date('Y-m-d');
        }
        if($to_date == ''){
            $to_date=date('Y-m-d');
        }
        $data['to_date'] =$to_date;
        $data['from_date'] =$from_date;
        $data['stock_data'] = $this->Stock_model->get_stock_report($from_date, $to_date, $product_id);
        $this->load->view('header');
        $this->load->view('stock/stock_report_view', $data);
    }
}
