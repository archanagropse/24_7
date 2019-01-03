<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Caregiver Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Login','Caregiver_model','Provider_model','Admin_model'));
        $this->load->library('form_validation');
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin');
        }
        
    }
    public function index(){
     $admin_info=$this->session->userdata('admin_logged_in');
     $data['caregiver_list']=$this->Caregiver_model->getCaregiver([],'');
     $data['admin_info']=$admin_info;
     $data['view_link']='../caregiver/caregiver_list';
     $this->load->view('layout/template',$data);
    }
    public function caregiver_detail(){
     $id=$this->uri->segment(3);
     $this->verify();
     $admin_info=$this->session->userdata('admin_logged_in');
     $caregiver=$this->Caregiver_model->getCaregiver(['c.user_id'=>$id],'');
     $tax_info=$this->Caregiver_model->get_taxinfo(['user_id'=>$caregiver[0]['user_id']]);
     $doc_info=$this->Caregiver_model->get_doc(['user_id'=>$caregiver[0]['user_id']]);
     if(!empty($tax_info)){
         $data['tax_info']=$tax_info[0];
     }
     else{
         $data['tax_info']="";
     }
     if(!empty($doc_info)){
     $data['doc_info']=$doc_info;
     }
     else{
         $data['doc_info']="";
     }
//     echo "<pre>";
//     print_r($data);exit;
     $data['caregiver_info']=$caregiver[0];
     $data['admin_info']=$admin_info;
     $data['view_link']='../caregiver/caregiver_detail';
     $this->load->view('layout/template',$data);
    }
    
    public function verify(){
        
        $id=$this->uri->segment(3);
        //$admin_info=$this->session->userdata('admin_logged_in');
        $caregiver=$this->Caregiver_model->getCaregiver(['c.user_id'=>$id],'');
        $tax_info=$this->Caregiver_model->get_taxinfo(['user_id'=>$caregiver[0]['user_id']]);
        $doc_info=$this->Caregiver_model->get_doc(['user_id'=>$caregiver[0]['user_id']]);
        $flag=1; 
        foreach($doc_info as $docs){
            if($docs['status'] == '0'){
                $flag=0;
            }
        }
        $flag1=1;
        if($tax_info){
        $status=['1','2','3'];
        $tax_array=explode(',',$tax_info[0]['status']);
        foreach($status as $status){
            if(!in_array($status, $tax_array)){
                $flag1=0;
            }
        }
        
        }
        if($flag && $flag1){
           $data=[
               'is_verified'=>1
           ];
        }else{
           $data=[
               'is_verified'=>0
           ];
        }
         
        
        $this->Admin_model->updateSingleDataTable('users',$data,['user_id'=>$id]);
    }
}
?>
