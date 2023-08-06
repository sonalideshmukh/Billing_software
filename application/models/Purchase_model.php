<?php
class Purchase_model extends CI_Model {


    public function create_purchase_bill($data,$table_name) {
        $this->db->insert($table_name, $data);
    }
    public function get_purchase($product_id='') {
        if($product_id){
            $where =array('id' => $product_id);
        }else{
            $where =array('1' => 1);
        }
        $query = $this->db->get_where('purchase_bills', $where);

        return $query->result();
    }
}
?>