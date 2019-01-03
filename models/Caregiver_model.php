<?php

class Caregiver_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getCaregiver($condition , $limit){
        
        if($limit){
          $this->db->limit($limit);  
        }
        $query=$this->db->select('*')
                ->from('caregiver_detail as c')
                ->where($condition)
                ->order_by('id','DESC')
                ->join('users as user', 'c.user_id = user.user_id', 'FULL')
                ->get();
        return $query->result_array();
        
        

    }
    
    public function get_taxinfo($condition){
        $query=$this->db->where($condition)
                        ->get('tax_information');
        return $query->result_array();
    }
    
     public function get_doc($condition){
        $query=$this->db->where($condition)
                        ->get('documents');
        return $query->result_array();
    }
}

?>
