<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Login','Caregiver_model','Provider_model','Admin_model'));
        $this->load->library('form_validation');
        
        
    }

    

    public function index() {
       
        
         $this->form_validation->set_error_delimiters('<p style="color:#a94442;">', '</p>');
                $this->form_validation->set_rules('username','Username','trim|required');
                $this->form_validation->set_rules('password','Password','trim|required');
                if($this->form_validation->run() == FALSE){
                   $this->load->view('login/index'); 
                }
                else{
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                $result = $this->Login->admin_login($username, $password);
                
                if ($result) {
                    $sessionArr = ['admin_id' => $result['id'], 'username' => $result['username'], 'image'=> $result['img']];
                    $this->session->set_userdata('admin_logged_in', $sessionArr);
                    redirect('Admin/dashboard');
                } else {
                    $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email or password is incorrect</div>');

                    redirect('Admin');
                    
                    
            }
                }
                
		
	}
        
        public function dashboard(){
            if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin');
            }
            else{
            $admin_info=$this->session->userdata('admin_logged_in');
            $data['caregiver_list']=$this->Caregiver_model->getCaregiver([],'5');
            $data['provider_list']=$this->Provider_model->getProvider([],'5');
            $data['admin_info']=$admin_info;
            $data['view_link']='dashboard/dashboard';
            $this->load->view('layout/template',$data);
            }
        }
        
        
        public function logout(){
            $this->session->unset_userdata('admin_logged_in');
            redirect('Admin');
    
        }
        
        public function ajax(){
            $this->load->view('server');
        }
   
}
?>

