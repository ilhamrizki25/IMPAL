<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pet extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('PetModel','pet');
        $this->load->model('AccountModel','account');
    }
    public function index(){
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in){
            redirect(base_url().'Login');
        }
        $email = $this->session->userdata('Email');
        $checkaccount = $this->account->checkaccount($email);
        if(!$checkaccount){
            redirect(base_url().'Account');
        }
        $email = $this->session->userdata('Email');
        $ign = $this->account->get_IGN($email);
        $data['judul'] = 'list Pet';
		$data['pet'] = $this->pet->getAllbyId($ign->IGN);
		$this->load->view('templates/header', $data);
		$this->load->view('pet/list', $data);
		$this->load->view('templates/footer'); 
    }
    public function add(){
        $this->load->view('header');
        $this->load->view('pet/newpet');
        $this->load->view('footer');
         
    }
    public function new(){
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            //set the validation errors in flashdata (one time session)
            $this->session->set_flashdata('msg', validation_errors());
            redirect(base_url() . 'shop');
        }
        $email = $this->session->userdata('Email');
        $njPet = $this->account->get_jPet($email);
        $ign = $this->account->get_IGN($email);
        $name = $this->input->post('name');
        $gold = $this->account->get_Gold($ign->IGN);
        $Price = 50;
        $JPet=$njPet->jPet;
        $newjpet=$JPet+1;
        $Gold = $gold->Gold;
        $gender = $this->input->post('gender');
        if ($Gold>=$Price){
            if($gender=='Cat'){
                $data = [
                    'pet_id'=>uniqid(), 'IGN' => $ign->IGN , 'pet_name'=>$name, 'id_Equipment'=>'', 
                    'max_hp' => 200,'hp'=>200, 'attack' => 10, 'max_stamina' => 100, 'stamina' => 100,
                    'level' => 1, 'exp_up'=>100, 'exp'=>0, 'pet_type'=>1
                ];
            }else{
                $data = [
                    'pet_id'=>uniqid(), 'IGN' => $ign->IGN , 'pet_name'=>$name, 'id_Equipment'=>'', 
                    'max_hp' => 150,'hp'=>150, 'attack' => 10, 'max_stamina' => 120, 'stamina' => 120,
                    'level' => 1, 'exp_up'=>100, 'exp'=>0, 'pet_type'=>2
                ];
            }
        $save = $this->pet->save($data);
        $newgold = $Gold-$Price;
        if ($save) {
            $this->account->update_Pet($ign->IGN,$newjpet);
            $this->account->update_Gold($ign->IGN,$newgold);
            $kalimat = "Succesfully bought pet";
            $this->load->view('VbPetSummary', ['kalimat'=>$kalimat]);
        }
        }else{
            $$kalimat = "Not Enough Gold";
            $this->load->view('VbPetSummary', ['kalimat'=>$kalimat]);
        }

    }
}