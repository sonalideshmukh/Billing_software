<?php
class Product_model extends CI_Model {


    public function create_product($data) {
        $this->db->insert('products', $data);
    }
    public function get_product($product_id='') {
        if($product_id){
            $where =array('id' => $product_id);
        }else{
            $where =array('1' => 1);
        }
        $query = $this->db->get_where('products', $where);
        if($product_id){
            return $query->row();
        }else{
            return $query->result();
        }
    }

}
?>