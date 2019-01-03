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
        $data['request_list'] = $this->Admin_model->getTableDataArray('request','status="0"','request_id');
        $data['admin_info'] = $admin_info;
        //print_r($data);exit;
        $data['view_link'] = '../request/new_request';
        $this->load->view('layout/template', $data);
    }
	public function assigned_request() {
		$resArr=array();
        $admin_info = $this->session->userdata('admin_logged_in');
        $request_list = $this->Admin_model->getTableDataArray('request','status="4"','request_id');
		foreach($request_list as $val){
			$assigned = $this->Admin_model->getSingleDataRow('assigned','request_id="'.$val['request_id'].'"','request_id');
			$val['assigned_date']=$assigned['assigned_date'];
			array_push($resArr,$val);
		}
		$data['request_list']=$resArr;
        $data['admin_info'] = $admin_info;
        //echo '<pre/>';print_r($data);exit;
        $data['view_link'] = '../request/assigned_request';
        $this->load->view('layout/template', $data);
    }
	public function assigned_caregivers_list() {
		$id = $this->uri->segment(3);
		$resArr=array();
        $admin_info = $this->session->userdata('admin_logged_in');
        $request_list = $this->Admin_model->getTableDataArray('assigned','request_id="'.$id.'"','request_id');
		//echo '<pre/>';print_r($request_list);exit;
		foreach($request_list as $val){
			$users = $this->Admin_model->getSingleDataRow('users','user_id="'.$val['user_id'].'"','user_id');
			array_push($resArr,$users);
		}
		$data['request_list']=$resArr;
        $data['admin_info'] = $admin_info;
        //echo '<pre/>';print_r($data);exit;
        $data['view_link'] = '../request/assigned_caregivers_list';
        $this->load->view('layout/template', $data);
    }
	public function accepted_request() {
		$resArr=array();
        $admin_info = $this->session->userdata('admin_logged_in');
        $request_list = $this->Admin_model->getTableDataArray('request','status="1"','request_id');
		foreach($request_list as $val){
			$assigned = $this->Admin_model->getSingleDataRow('assigned','request_id="'.$val['request_id'].'"','request_id');
			$val['assigned_date']=$assigned['assigned_date'];
			$val['accepted_date']=$assigned['accepted_date'];
			array_push($resArr,$val);
		}
		$data['request_list']=$resArr;
        $data['admin_info'] = $admin_info;
        //echo '<pre/>';print_r($data);exit;
        $data['view_link'] = '../request/accepted_request';
        $this->load->view('layout/template', $data);
    }
	public function ongoing_request() {
		$resArr=array();
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['request_list']=$this->Admin_model->getTableDataArray('request','status="5"','request_id');
		$data['admin_info'] = $admin_info;
        //echo '<pre/>';print_r($data);exit;
        $data['view_link'] = '../request/ongoing_request';
        $this->load->view('layout/template', $data);
    }
	public function complete_request() {
		$resArr=array();
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['request_list']=$this->Admin_model->getTableDataArray('request','status="2"','request_id');
		$data['admin_info'] = $admin_info;
        //echo '<pre/>';print_r($data);exit;
        $data['view_link'] = '../request/complete_request';
        $this->load->view('layout/template', $data);
    }
	public function cancelled_request() {
		$resArr=array();
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['request_list']=$this->Admin_model->getTableDataArray('request','status="3"','request_id');
		$data['admin_info'] = $admin_info;
        //echo '<pre/>';print_r($data);exit;
        $data['view_link'] = '../request/cancelled_request';
        $this->load->view('layout/template', $data);
    }
	public function request_detail() {
        $id = $this->uri->segment(3);
        $admin_info = $this->session->userdata('admin_logged_in');
        $request_info = $this->Admin_model->getSingleDataRow('request','request_id="'.$id.'"','request_id');
        $provider = $this->Admin_model->getSingleDataRow('users','user_id="'.$request_info['provider_id'].'"','user_id');
		$request_info['provider_name']=$provider['name'];
		//echo '<pre/>';print_r($request_info);exit;
        $data['request_info'] = $request_info;
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/request_detail';
        $this->load->view('layout/template', $data);
    }
	public function accepted_request_detail() {
        $id = $this->uri->segment(3);
        $admin_info = $this->session->userdata('admin_logged_in');
        $request_info = $this->Admin_model->getSingleDataRow('request','request_id="'.$id.'"','request_id');
        $provider = $this->Admin_model->getSingleDataRow('users','user_id="'.$request_info['provider_id'].'"','user_id');
        $user = $this->Admin_model->getSingleDataRow('users','user_id="'.$request_info['user_id'].'"','user_id');
		$assigned = $this->Admin_model->getSingleDataRow('assigned','request_id="'.$id.'" and user_id="'.$request_info['user_id'].'"','request_id');
		$request_info['assigned_date']=$assigned['assigned_date'];
		$request_info['accepted_date']=$assigned['accepted_date'];
		$request_info['provider_name']=$provider['name'];
		$request_info['user_name']=$provider['name'];
		//echo '<pre/>';print_r($request_info);exit;
        $data['request_info'] = $request_info;
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/accepted_request_detail';
        $this->load->view('layout/template', $data);
    }
	public function cancel_request() {
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['request_list'] = $this->Admin_model->getCancelRequest(['cancel_request'=> '1'],['0','4']);
		$data['request_list']=$this->Admin_model->getTableDataArray('request','status!="3" and cancel_request!=0','request_id');
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/cancel_request_list';
        $this->load->view('layout/template', $data);
    }
	
	
	public function request_caregiver(){
        $speciality = $this->uri->segment(3);
        $request_id = $this->uri->segment(4);
        $admin_info = $this->session->userdata('admin_logged_in');
        $caregiver_info = $this->Caregiver_model->getCaregiver(['speciality' => $speciality],'');
        if(!isset($_POST['select_caregiver'])){
        $data['caregiver_info'] = $caregiver_info;
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../request/request_caregiver';
        //print_r($data);exit;
        $this->load->view('layout/template', $data);
        }
        else{
            $request_info=$this->Admin_model->getRequest(['request_id'=>$request_id]);
            
            foreach ($this->input->post('select_caregiver') as $key => $user_id) {
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
                    redirect('Request/new-request');
                }
                else{
                    $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Request Assign Error</div>');
                    redirect('Request/new-request');
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
                $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Request Cancelled Successfully</div>');
                redirect('Request/cancel-request');
            }
        }

}

?>