<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class City Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model'));
        $this->load->library('form_validation');
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin');
        }
    }

    public function add_city() {
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['city_list'] = $this->Admin_model->getCity(['status'=>'1']);
        
        $this->form_validation->set_error_delimiters('<p style="color:#a94442;">', '</p>');
        $this->form_validation->set_rules('city_name', 'City','required');
        
        if($this->form_validation->run()== False){
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../city/index';
        $this->load->view('layout/template', $data);
        }
        else{
            $insertArr=[
                'city'=>$this->input->post('city_name'),
                'status'=>'1'
            ];
            
            $query=$this->Admin_model->add_city($insertArr);
            if($query){
                $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>City Added successfully</div>');
                    redirect('Admin/add-city');
            }
            else{
                $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error while adding City</div>');
                    redirect('Admin/add-city');
            }
            
        }
    }
    
    public function delete_city(){
        $id=$this->uri->segment(3);
        $updateArr=[
                
                'status'=>'0'
            ];
            
            $query=$this->Admin_model->update_city(['id'=>$id],$updateArr);
            if($query){
                $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>City Deleted successfully</div>');
                    redirect('Admin/add-city');
            }
            else{
                $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error while deleting City</div>');
                    redirect('Admin/add-city');
            }
    }
    

    

}

?>
