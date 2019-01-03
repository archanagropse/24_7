<?php

if($_POST['method'] == 'userUpdateStatus'){
       
            $adminModal         = new Admin_model();
            $document['user_id']     = $_POST['dataId'];
            $document['is_verified'] = $_POST['action'];
            $table = "users";
            
            $data = $adminModal->updateDataTable('user_id',$document,$table,'user_id');
            if($data){
                    $error      = false;
                    $code       = 100;
                    $msg        = 'Updated Successfully.';
                    $data       = array();
            }else{
                    $error      = false;
                    $code       = 101;
                    $msg        = 'Error';
                    $data       = array();
            }
            echo json_encode(array('error'=>$error,'error_code'=>$code,'message'=>$msg,'data'=>$data));
    }
    if($_POST['method'] == 'checkQuestionStatus'){
       
            $adminModal         = new Admin_model();
            $document['id']     = $_POST['id'];
            $document['status'] = $_POST['status'];
            $table = "question";
            
            $data = $adminModal->updateDataTable('id',$document,$table,'id');
            if($data){
                    $error      = false;
                    $code       = 100;
                    $msg        = 'Updated Successfully.';
                    $data       = array();
            }else{
                    $error      = false;
                    $code       = 101;
                    $msg        = 'Error';
                    $data       = array();
            }
            echo json_encode(array('error'=>$error,'error_code'=>$code,'message'=>$msg,'data'=>$data));
    }
        if($_POST['method'] == 'checkCourseStatus'){
       
            $adminModal         = new Admin_model();
            $document['id']     = $_POST['id'];
            $document['status'] = $_POST['status'];
            $table = "course";
            
            $data = $adminModal->updateDataTable('id',$document,$table,'id');
            if($data){
                    $error      = false;
                    $code       = 100;
                    $msg        = 'Updated Successfully.';
                    $data       = array();
            }else{
                    $error      = false;
                    $code       = 101;
                    $msg        = 'Error';
                    $data       = array();
            }
            echo json_encode(array('error'=>$error,'error_code'=>$code,'message'=>$msg,'data'=>$data));
    }
    
    
    ?>

