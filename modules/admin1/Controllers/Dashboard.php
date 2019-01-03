<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard Extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Caregiver_model');
        $this->load->library('form_validation');
        
    }
    
    

    
}
?>

