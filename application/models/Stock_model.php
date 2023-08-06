<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_stock_report($from_date, $to_date, $product_id) {

        $this->db->select('p.id, p.product_name, 
        COALESCE(SUM(purchase_bills.purchase_quantity), 0) as purchase_qty, 
        COALESCE(SUM(sale_bills.sale_quantity), 0) as sale_qty');
        $this->db->select('(SELECT COALESCE(SUM(qty), 0) 
            FROM purchase_bills 
            WHERE date < ' . $this->db->escape($from_date) . ' AND product_id = p.id) as opening', FALSE);
        $this->db->from('products p');
        $this->db->join('(SELECT product_id, SUM(qty) as purchase_quantity FROM purchase_bills WHERE date BETWEEN ' . $this->db->escape($from_date) . ' AND ' . $this->db->escape($to_date) . ' GROUP BY product_id) purchase_bills', 'p.id = purchase_bills.product_id', 'left');
        $this->db->join('(SELECT product_id, SUM(qty) as sale_quantity FROM sale_bills  WHERE date BETWEEN ' . $this->db->escape($from_date) . ' AND ' . $this->db->escape($to_date) . ' GROUP BY product_id) sale_bills', 'p.id = sale_bills.product_id', 'left');

        if (!empty($product_id)) {
            $this->db->where('p.id', $product_id);
        }

        $this->db->group_by('p.id');
        $query = $this->db->get();
        return $query->result_array(); 

    }

}
