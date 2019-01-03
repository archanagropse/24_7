<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Provider Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Login', 'Caregiver_model', 'Provider_model'));
        $this->load->library('form_validation');
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('Admin');
        }
    }

    public function index() {
        $admin_info = $this->session->userdata('admin_logged_in');
        $data['provider_list'] = $this->Provider_model->getProvider([],'');
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../provider/provider_list';
        $this->load->view('layout/template', $data);
    }

    public function provider_detail() {
        $id = $this->uri->segment(3);
        $admin_info = $this->session->userdata('admin_logged_in');
        $provider_info = $this->Provider_model->getProvider(['id' => $id],'');
        $data['provider_info'] = $provider_info[0];
        $data['admin_info'] = $admin_info;
        $data['view_link'] = '../provider/provider_detail';
        $this->load->view('layout/template', $data);
    }

}

?>