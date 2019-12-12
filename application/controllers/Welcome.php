<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('MRestaurant');
        $this->load->model('AccountModel','account');
     }
    public function index() {
        
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in){
            //if yes redirect to welcome page
            redirect(base_url().'Login');
        }
        $email = $this->session->userdata('Email');
        $ign = $this->account->get_IGN($email);
        $gold = $this->account->get_gold($ign->IGN);
        $gem = $this->account->get_gem($ign->IGN);
        $data['ign'] = $ign->IGN;
        $data['gold'] = $gold->Gold;
        $data['gem'] = $gem->Gem;
		$this->load->view('dashboard', $data);
    }

}
