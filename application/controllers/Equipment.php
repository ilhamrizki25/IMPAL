<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('EquipmentModel','equipment');
        $this->load->model('AccountModel','account');
        $this->load->model('WarehouseModel','warehouse');
    }
    public function index(){
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in){
            redirect(base_url().'Login');
        }
        $email = $this->session->userdata('Email');
        $checkaccount = $this->account->checkaccount($email);
        if($checkaccount){
            redirect(base_url().'Welcome');
        }
        $this->load->view('header');
        $this->load->view('account/newaccount_page');
        $this->load->view('footer');   
    }

    public function list(){
        $email = $this->session->userdata('Email');
		$data['equipment'] = $this->equipment->getAll();
		$this->load->view('EquipmentShop', $data);
    }
    public function buy($id){
        $email = $this->session->userdata('Email');
        $ign = $this->account->get_IGN($email);
        $gold = $this->account->get_Gold($ign->IGN);
        $price = $this->equipment->get_price($id);
        $Price = $price->price;
        $Gold = $gold->Gold;
        if ($Gold>$Price){
            $data = [
                'id_Equipment' => $id ,'IGN' => $ign->IGN
           ];
           $buy = $this->equipment->buy($data);
           $newgold = $Gold-$Price;
           if($buy){
               $this->account->update_Gold($ign->IGN,$newgold);
               $this->session->set_flashdata('flash', var_dump($newgold));
               redirect('Equipment/list');
           }
        }else{
            $this->session->set_flashdata('flash', 'gold tidak cukup');
            redirect('Equipment/list');
        }
    }
    public function inventory(){
        $email = $this->session->userdata('Email');
        $ign = $this->account->get_IGN($email);
        $data['equipment'] = $this->warehouse->getEquipment($ign->IGN);
        $this->load->view('Warehouse', $data);
    }
}