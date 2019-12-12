<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAccount extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('MAccount');
     }
    public function index()
    {
        $email = $this->session->userdata('Email');
        $dataAcc = $this->MAccount->getData($email);
        $this->load->view('VAccount', ['data'=> $dataAcc]);   
    }



}