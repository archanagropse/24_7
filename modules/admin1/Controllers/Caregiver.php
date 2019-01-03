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
     //$data['caregiver_list']=$this->Admin_model->getDataArray(['user_type'=>'1'],'users');
     $data['admin_info']=$admin_info;
     $data['view_link']='../caregiver/caregiver_list';
     $this->load->view('layout/template',$data);
    }
    public function caregiver_detail(){
     $id=$this->uri->segment(3);
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
     $data['doc_info']=$doc_info[0];
     }
     else{
         $data['doc_info']="";
     }
     $data['caregiver_info']=$caregiver[0];
     $data['admin_info']=$admin_info;
     $data['view_link']='../caregiver/caregiver_detail';
     $this->load->view('layout/template',$data);
    }
}
?>
