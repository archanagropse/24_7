<?php

class Speciality_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getSpeciality($condition){
        $query=$this->db->where($condition)
                        ->get('speciality');
        return $query->result_array();
    }
    public function add_speciality($insertArr){
        $query=$this->db->insert('speciality',$insertArr);
        return $query;
     }
     
     public function update_speciality($condition,$updateArr){
        $query=$this->db->where($condition)
                ->update('speciality',$updateArr);
       
        return $query;
     }
}
    
    ?>
