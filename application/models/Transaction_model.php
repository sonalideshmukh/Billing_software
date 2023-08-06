<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // public function get_transaction_report($from_date, $to_date, $product_id, $type) {
    //     $this->db->select('p.date, s.name as seller_name, c.name as buyer_name, p.qty as quantity, p.rate, p.gst, p.total,1 as type');
    //     $this->db->from('purchase_bills p');
    //     $this->db->join('sellers s', 'p.seller_id = s.id', 'left');
    //     $this->db->join('purchasers c', 'p.purchaser_id = c.id', 'left');

    //     if (!empty($from_date)) {
    //         $this->db->where('p.date >=', $from_date);
    //     }

    //     if (!empty($to_date)) {
    //         $this->db->where('p.date <=', $to_date);
    //     }

    //     if (!empty($product_id)) {
    //         $this->db->where('p.product_id', $product_id);
    //     }

    //     if (!empty($type)) {
    //         $this->db->where('p.type', $type);
    //     }

    //     $query = $this->db->get();
    //     return $query->result_array();

    // }
    public function get_transaction_report($from_date, $to_date, $product_id, $type) {
     $this->db->select('p.date, s.name as seller_name, c.name as buyer_name, p.qty as quantity, p.rate, p.gst, p.total,"Purchase" as type');
      $this->db->from('purchase_bills p');
        $this->db->join('sellers s', 'p.seller_id = s.id', 'left');
        $this->db->join('purchasers c', 'p.purchaser_id = c.id', 'left');

        if (!empty($from_date)) {
            $this->db->where('p.date >=', $from_date);
        }

        if (!empty($to_date)) {
            $this->db->where('p.date <=', $to_date);
        }

        if (!empty($product_id)) {
            $this->db->where('p.product_id', $product_id);
        }

        if (!empty($type)) {
            $this->db->where('p.type', $type);
        }

        $this->db->group_by('p.date,s.name');

    $query1 = $this->db->get_compiled_select();

    // Reset the active query for the next select
    $this->db->reset_query();

    $this->db->select('t.date,  p.name as seller_name,c.name AS buyer_name, t.qty as quantity, t.rate, t.gst, t.total,"Sale" AS type');
    $this->db->from('sale_bills t');
    $this->db->join('purchasers p', 't.purchaser_id = p.id', 'left');
    $this->db->join('customers c', 't.customer_id = c.id', 'left');

    if (!empty($from_date)) {
        $this->db->where('t.date >=', $from_date);
    }

    if (!empty($to_date)) {
        $this->db->where('t.date <=', $to_date);
    }

    if (!empty($product_id)) {
        $this->db->where('t.product_id', $product_id);
    }

    if (!empty($type)) {
        $this->db->where('t.type', $type);
    }

    $this->db->group_by('t.date, c.name');

    $query2 = $this->db->get_compiled_select();

    // Combine the two queries using UNION
    $query = $this->db->query($query1 . ' UNION ' . $query2);
    return $query->result_array();
}

}
