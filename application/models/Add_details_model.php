<?php
class Add_details_model extends CI_Model {


    public function add_seller($data) {
        $this->db->insert('sellers', $data);
    }
    public function get_seller($product_id='') {
        if($product_id){
            $where =array('id' => $seller_id);
        }else{
            $where =array('1' => 1);
        }
        $query = $this->db->get_where('sellers', $where);

        return $query->result();
    }
     public function add_purchaser($data) {
        $this->db->insert('purchasers', $data);
    }
    public function get_purchaser($product_id='') {
        if($product_id){
            $where =array('id' => $seller_id);
        }else{
            $where =array('1' => 1);
        }
        $query = $this->db->get_where('purchasers', $where);

        return $query->result();
    }
     public function add_customer($data) {
        $this->db->insert('customers', $data);
    }
    public function get_customer($product_id='') {
        if($product_id){
            $where =array('id' => $seller_id);
        }else{
            $where =array('1' => 1);
        }
        $query = $this->db->get_where('customers', $where);

        return $query->result();
    }
}
?>