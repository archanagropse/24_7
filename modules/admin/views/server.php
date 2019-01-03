<?php

if ($_POST['method'] == 'userUpdateStatus') {

    $adminModal = new Admin_model();
    $document['user_id'] = $_POST['dataId'];
    $document['is_verified'] = $_POST['action'];
    $table = "users";

    $data = $adminModal->updateDataTable('user_id', $document, $table, 'user_id');
    if ($data) {
        $error = false;
        $code = 100;
        $msg = 'Updated Successfully.';
        $data = array();
    } else {
        $error = false;
        $code = 101;
        $msg = 'Error';
        $data = array();
    }
    echo json_encode(array('error' => $error, 'error_code' => $code, 'message' => $msg, 'data' => $data));
}

if ($_POST['method'] == 'checkStatus') {

    $adminModal = new Admin_model();
    $document['id'] = $_POST['dataId'];
    $document['status'] = $_POST['action'];
    $type = $_POST['type'];
    if ($type == 1) {
        $table = "documents";
    } else if ($type == 2) {
        $table = "course";
    } else if ($type == 3) {
        $table = "question";
    }
    $query = $adminModal->updateDataTable('id', $document, $table, 'id');
    if ($query) {
        $error = false;
        $code = 100;
        $msg = 'Updated Successfully.';
        $data = array();
    } else {
        $error = false;
        $code = 101;
        $msg = 'Error';
        $data = array();
    }
    echo json_encode(array('error' => $error, 'error_code' => $code, 'message' => $msg, 'data' => $data));
}
if ($_POST['method'] == 'verifyDoc') {

    $adminModal = new Admin_model();
    $document['id'] = $_POST['dataId'];
    $status = $_POST['action'];
    $type = $_POST['type'];
    $doc_status = $adminModal->getData(['id' => $document['id']], 'tax_information');
    if ($doc_status['status'] != '') {
        $array = explode(',', $doc_status['status']);
    } else {
        $array = array();
    }
    if ($status == 0) {
        $index = array_search($type, $array);
        unset($array[$index]);
    } else {
        array_push($array, $type);
    }
    $document['status'] = implode(',', $array);
    $query = $adminModal->updateDataTable('id', $document, 'tax_information', 'id');
    if ($query) {
        $error = false;
        $code = 100;
        $msg = 'Updated Successfully.';
        $data = array();
    } else {
        $error = false;
        $code = 101;
        $msg = 'Error';
        $data = array();
    }
    echo json_encode(array('error' => $error, 'error_code' => $code, 'message' => $msg, 'data' => $data));
}
?>

