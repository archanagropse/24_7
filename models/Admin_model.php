<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRequest($condition) {
        $query = $this->db->where($condition)
                ->get('request');
       
        return $query->result_array();
    }
    
     public function getCancelRequest($condition,$status) {
         
        $query = $this->db->where($condition)->where_in('status',$status)
                ->get('request');
        
        return $query->result_array();
    }
    
    public function assign_request($insertArr){
        $query=$this->db->insert('assigned', $insertArr);
        return $query;
    }
    
    public function update_request($condition,$updateArr){
        
        $query=$this->db->where($condition)
                    ->update('request', $updateArr);
        return $query;
    }
    
     public function getCity($condition) {
        $query = $this->db->where($condition)
                ->get('city');
       
        return $query->result_array();
    }
    
     public function add_city($insertArr){
        $query=$this->db->insert('city', $insertArr);
        return $query;
    }
     public function update_city($condition,$updateArr){
        $query=$this->db->where($condition)
                ->update('city',$updateArr);
       
        return $query;
     }
     
     public function updateDataTable($column,$field,$table,$specify){
         $this->db->where($column,$field[$specify]);
         $query=$this->db->update($table,$field);
         return $query;
     }
     
     public function getData($condition,$table){
         $query = $this->db->where($condition)
                ->get($table);
       
        return $query->row_array();
     }
     
     
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function getSingleDataRow($table,$where,$orderBY){
		$this->db->where($where);
		if($orderBY){ $this->db->order_by($orderBY,'DESC');}
		$getEventTag = $this->db->get($table)->row_array();
		return $getEventTag;
	}

	function getTableDataArray($table,$where,$orderBY){
		$this->db->where($where);
		if($orderBY){ $this->db->order_by($orderBY,'DESC');}
		$getEventTag = $this->db->get($table)->result_array();
		return $getEventTag;
	}
	function insertDataTable($table,$data){
		$results = $this->db->insert($table,$data);
        if($results){
			return true;
		}else{
			return false;
		}
	}
	function updateSingleDataTable($table,$data,$where){
		//echo print_r($data);exit;
		$this->db->where($where);
		$results=$this->db->update($table,$data);
        if($results){
			return true;
		}else{
			return false;
		}
	}
	
	function deleteDataTable($table,$where){
		//echo $where;exit;
		$results=$this->db->where($where)
            ->delete($table);
        if($results){
			return true;
		}else{
			return false;
		}
	}
	
	

}

?>