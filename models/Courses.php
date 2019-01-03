<?php

class Courses extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getCourses($condition){
        $this->db->where($condition);
        $query=$this->db->get('course');
        return $query->result_array();
    }
    
    public function addCourses($insertArr){
     
        $query=$this->db->insert('course',$insertArr);
        return $query;
    }
    
    public function updateCourses($condition,$updateArr){
        $this->db->where($condition);
        $query=$this->db->update('course',$updateArr);
        return $query;
    }
     public function getQuestion($condition){
        $this->db->where($condition);
        $query=$this->db->get('question');
        return $query->result_array();
    }
     public function addQuestion($data){
        $query=$this->db->insert('question',$data);
        return $query;
    }
    
    
}
