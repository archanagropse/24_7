<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Courses','Admin_model'));
        $this->load->library(['form_validation','upload']);
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin');
        }
    }

    public function index() {
        $data['course_list']=$this->Courses->getCourses([]);
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../course/index';
        $this->load->view('layout/template', $data);
    }

    public function add_course() {
        
        if (isset($_POST['submit'])) {
             $insertArr=[
                    'course_name'=>$this->input->post('course_name'),
                    'course_type'=>$this->input->post('course_type'),
                    'rating'=>$this->input->post('rating'),
                    'status'=>'1',
                    'date_time'=>date('Y-m-d h:i:s'),
                ];
                
           
            $file = $_FILES['video-upload'];
                if (!empty($file['type'])) {
                    $extArr = explode('/', $file['type']);
                    $ext = $extArr[1];

                    $uploadPath = 'uploads/videos/';
                    $uploadFile = 'Course_Video' . '_' . time() . '.' . $ext;

                    if (move_uploaded_file($file['tmp_name'], $uploadPath . $uploadFile)) {
                        $insertArr['video'] = base_url() . $uploadPath . $uploadFile;
                    }
                } else {
                    $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>File size exeeds allowed limit</div>');
                    redirect('Admin/add-courses');
                }
                $image = $_FILES['file-upload'];
                if (!empty($image['name'])) {
                    $extArr = explode('/', $image['type']);
                    $ext = $extArr[1];

                    $uploadPath = 'uploads/thumbnails/';
                    $uploadFile = 'Course_Thumbnail' . '_' . time() . '.' . $ext;

                    if (move_uploaded_file($image['tmp_name'], $uploadPath . $uploadFile)) {
                        $insertArr['image'] = base_url() . $uploadPath . $uploadFile;
                    }
                } 
               
                $query=$this->Courses->addCourses($insertArr);
                if($query){
                    $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Course Added Successfully</div>');
                    redirect('Admin/courses-list');
                }
                else{
                    $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error While Adding Course</div>');
                    redirect('Admin/courses-list');
                }
            }
        

        $admin_info = $this->session->userdata('admin_logged_in');
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../course/add_course';
        $this->load->view('layout/template', $data);
    }

    public function course_detail(){
        $id=$this->uri->segment(3);
        $course=$this->Courses->getCourses(['id'=>$id]);
        
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['question']=$this->Courses->getQuestion(['course_id'=>$id]);
        $data['course']=$course[0];
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../course/course_details';
        $this->load->view('layout/template', $data); 
    }
    
    public function edit_courses(){
        $id=$this->uri->segment(3);
        $course=$this->Courses->getCourses(['id'=>$id]);
        $prev_img=$course[0]['image'];
        $prev_vdo=$course[0]['video'];
        $admin_info = $this->session->userdata('admin_logged_in');
        //$data['question']=$this->Courses->getQuestion(['course_id'=>$id]);
        if(isset($_POST['submit'])){
           $updateArr=[
                    'course_name'=>$this->input->post('course_name'),
                    'course_type'=>$this->input->post('course_type'),
                    'rating'=>$this->input->post('rating'),
                    'status'=>'1',
                    'date_time'=>date('Y-m-d h:i:s'),
                ]; 
           
            $file = $_FILES['video-upload'];
            if(!empty($file['name'])){
                if (!empty($file['type'])) {
                    $extArr = explode('/', $file['type']);
                    $ext = $extArr[1];

                    $uploadPath = 'uploads/videos/';
                    $uploadFile = 'Course_Video' . '_' . time() . '.' . $ext;

                    if (move_uploaded_file($file['tmp_name'], $uploadPath . $uploadFile)) {
                        $updateArr['video'] = base_url() . $uploadPath . $uploadFile;
                        @unlink($prev_vdo);
                    }
                } else {
                    $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>File size exeeds allowed limit</div>');
                    redirect('Admin/edit-courses/'.$id);
                }
            }
            
                $image = $_FILES['file-upload'];
                if (!empty($image['name'])) {
                    $extArr = explode('/', $image['type']);
                    $ext = $extArr[1];

                    $uploadPath = 'uploads/thumbnails/';
                    $uploadFile = 'Course_Thumbnail' . '_' . time() . '.' . $ext;

                    if (move_uploaded_file($image['tmp_name'], $uploadPath . $uploadFile)) {
                        $updateArr['image'] = base_url() . $uploadPath . $uploadFile;
                        @unlink($prev_img);
                    }
                } 
                
                $query=$this->Courses->updateCourses(['id'=>$id],$updateArr);
                if($query){
                    $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Course Updated Successfully</div>');
                    redirect('Admin/courses-list');
                }
                else{
                    $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error While Updating Course</div>');
                    redirect('Admin/courses-list');
                }
        }
        
        $data['course']=$course[0];
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../course/edit_course';
        $this->load->view('layout/template', $data); 
    }
    
    public function add_question(){
        $course_id=$this->uri->segment(3);
      
        $admin_info = $this->session->userdata('admin_logged_in');
        
        if(isset($_POST['addQuestion'])){
            foreach($this->input->post('question') as $key=>$value){
            $insertArr=[
                    'course_id'=>$course_id,
                    'question'=>$this->input->post('question')[$key],
                    'option_1'=>$this->input->post('option_1')[$key],
                    'option_2'=>$this->input->post('option_2')[$key],
                    'option_3'=>$this->input->post('option_3')[$key],
                    'option_4'=>$this->input->post('option_4')[$key],
                    'answer'=>$this->input->post('answer')[$key],
                    'status'=>'1',
                    'date_time'=>date('Y-m-d h:i:s'),
                ]; 
            //print_r($insertArr);}
       $query=$this->Courses->addQuestion($insertArr);
        
        }
            if($query){
                 $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Question Added Successfully</div>');
                redirect('Admin/course-detail/'.$course_id);
            }
            else{
                 $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error while adding question to Course</div>');
                   redirect('Admin/add-question/'.$course_id);
            }
        }
        
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../course/add_question';
        $this->load->view('layout/template', $data);
    }
    
    public function edit_question(){
        $id=$this->uri->segment(3);
        $data['question']=$this->Admin_model->getData(['id'=>$id],'question');
        $course_id=$data['question']['course_id'];
        $admin_info = $this->session->userdata('admin_logged_in');
        $this->form_validation->set_error_delimiters('<p style="color:#a94442;">', '</p>');
        $this->form_validation->set_rules('question','Question','required');
        $this->form_validation->set_rules('option_1','Option 1','required');
        $this->form_validation->set_rules('option_2','Option 2','required');
        $this->form_validation->set_rules('option_3','Option 3','required');
        $this->form_validation->set_rules('option_4','Option 4','required');
        $this->form_validation->set_rules('answer','Answer','required');
        if($this->form_validation->run()== False){
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../course/edit_question';
        $this->load->view('layout/template', $data);
        }
        else{
           $updateArr=[
                    'id'=>$id,
                    'question'=>$this->input->post('question'),
                    'option_1'=>$this->input->post('option_1'),
                    'option_2'=>$this->input->post('option_2'),
                    'option_3'=>$this->input->post('option_3'),
                    'option_4'=>$this->input->post('option_4'),
                    'answer'=>$this->input->post('answer'),
           ]; 
           
           $query=$this->Admin_model->updateDataTable('id',$updateArr,'question','id');
           if($query){
                $this->session->set_flashdata('response', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Question Updated Successfully</div>');
                redirect('Admin/course-detail/'.$course_id);
           }
           else{
               $this->session->set_flashdata('response', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error while updating</div>');
                redirect('Admin/edit-question/'.$id);
           }
        }
    } 
    
   
}

?>
