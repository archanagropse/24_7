<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Speciality Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Speciality_model'));
        $this->load->library('form_validation');
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin');
        }
    }

    public function add_speciality() {
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['speciality_list'] = $this->Speciality_model->getSpeciality(['status'=>'1']);
        
        $this->form_validation->set_error_delimiters('<p style="color:#a94442;">', '</p>');
        $this->form_validation->set_rules('speciality_name', 'Speciality','Required');
        
        if($this->form_validation->run()== False){
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../speciality/index';
        $this->load->view('layout/template', $data);
        }
        else{
            $insertArr=[
                'speciality'=>$this->input->post('speciality_name'),
                'status'=>'1'
            ];
            
            $query=$this->Speciality_model->add_speciality($insertArr);
            if($query){
                $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Speciality Added successfully</div>');
                    redirect('Admin/add-speciality');
            }
            else{
                $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error while adding Speciality</div>');
                    redirect('Admin/add-speciality');
            }
            
        }
    }
    
    public function delete_speciality(){
        $id=$this->uri->segment(3);
        $updateArr=[
                
                'status'=>'0'
            ];
            
            $query=$this->Speciality_model->update_speciality(['id'=>$id],$updateArr);
            if($query){
                $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Speciality Deleted successfully</div>');
                    redirect('Admin/add-speciality');
            }
            else{
                $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error while deleting Speciality</div>');
                    redirect('Admin/add-speciality');
            }
    }
    

    

}

?>
