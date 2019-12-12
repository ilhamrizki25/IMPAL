<?php
class Test extends CI_Controller {

public function __construct() {
    parent::__construct();
    
    //load the required helpers and libraries
    $this->load->helper('url');
    $this->load->library(['form_validation', 'session']);
    $this->load->database();
}
public function index() {
    $this->load->view('header');
    $this->load->view('register_page');
    $this->load->view('footer');
}
}

