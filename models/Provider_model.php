<?php

class Provider_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getProvider($condition, $limit){
        if($limit){
          $this->db->limit($limit);  
        }
        $query=$this->db->where($condition)
                        ->order_by('id','DESC')
                        ->get('provider_detail');
        return $query->result_array();
    }
}

?>


