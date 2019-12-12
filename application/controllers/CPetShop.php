<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPetShop extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('MPetShop');
     }
    public function index()
    {
        $email = $this->session->userdata('Email');
        $dataAcc = $this->MPetShop->getData($email);
        $this->load->view('VPetShop', ['data'=> $dataAcc]);   
    }

    public function buyPet(){
        $email = $this->session->userdata('Email');
        $ign = $this->session->userdata('IGN');
        $gold = $this->MPetShop->getGold($email);
        if ($gold >= 50) {
            $data = array(
                'title' => 'My title',
                'IGN'  => $ign,
                'pet_name'  => 'My date',
                'id_Equipment' => '0',
                
            );
        }
    }

}