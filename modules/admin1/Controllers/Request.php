<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model','Caregiver_model'));
        $this->load->library('form_validation');
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin');
        }
    }

    public function index() {
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['request_list'] = $this->Admin_model->getRequest(['status'=> '0']);
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/request_list';
        $this->load->view('layout/template', $data);
    }

    public function request_detail() {
        $id = $this->uri->segment(3);
        $admin_info = $this->session->userdata('admin_logged_in');
        $request_info = $this->Admin_model->getRequest(['request_id' => $id]);
        $data['request_info'] = $request_info[0];
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/request_detail';
        $this->load->view('layout/template', $data);
    }
    
    public function request_caregiver(){
        $speciality = $this->uri->segment(3);
        $request_id = $this->uri->segment(4);
        $admin_info = $this->session->userdata('admin_logged_in');
        $caregiver_info = $this->Caregiver_model->getCaregiver(['user.speciality' => $speciality, 'user.is_verified'=>'1'],'');
        if(!isset($_POST['select_caregiver'])){
        $data['caregiver_info'] = $caregiver_info;
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/request_caregiver';
        $this->load->view('layout/template', $data);
        }
        else{
            $request_info=$this->Admin_model->getRequest(['request_id'=>$request_id]);
            
            foreach ($this->input->post('select_caregiver') as $key => $user_id) {echo "user_id".$user_id;
                $insertArr=[
                    'user_id'=>$user_id,
                    'request_id'=>$request_id,
                    'assigned_date'=>date('Y-m-d h:i:s'),
                    'job_date_time'=>date('Y-m-d h:i:s',strtotime($request_info[0]['shift_date'].$request_info[0]['shift_time'])),
                    'accepted_date'=>0,
                    'status'=>0
                ];
               
                $query=$this->Admin_model->assign_request($insertArr);
            }
                
                if($query){
                  
                    $updateArr=[
                    'status'=>'4'
                ];
                    $this->Admin_model->update_request(['request_id'=>$request_id],$updateArr);
                    $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Request Assigned successfully</div>');
                    redirect('Admin/provider-request');
                }
                else{
                    $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Request Assign Error</div>');
                    redirect('Admin/provider-request');
                }
            }
        }
        
        public function  delete_request(){
            $request_id = $this->uri->segment(3);
            $updateArr=[
                'status'=>'3'
            ];
            $query=$this->Admin_model->update_request(['request_id'=>$request_id],$updateArr);
            if($query){
                $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Request Deleted Successfully</div>');
                redirect('Admin/provider-request');
            }
        }
        
        public function cancel_request() {
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['request_list'] = $this->Admin_model->getCancelRequest(['cancel_request'=> '1'],['0','4']);
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/cancel_request_list';
        $this->load->view('layout/template', $data);
    }

}

?>