<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mypet extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('MRestaurant');
        $this->load->model('MTheInn');
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
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MRestaurant->getIGN($email);
        $dataPet = $this->MRestaurant->yourPet($dataIGN);
        $cDataPet = $this->MRestaurant->CyourPet($dataIGN);
        $dataGold = " ";
        if ($cDataPet == 0){
            $kalimat = "You don't have any pet <br> Please buy pet first!";
            $this->load->view('VmyPet0', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'kalimat'=>$kalimat]);
        } 
        else{
            $this->load->view('VmyPet', ['IGN'=> $dataIGN, 'data'=>$dataPet]); 
        }
    }

        public function getForm(){
            $form_data = $this->input->post();
            $pet_id = $this->input->post("pet");
            $email = $this->session->userdata('Email');
            $dataIGN = $this->MTheInn->getIGN($email);
            $dataGold = $this->MTheInn->getGold($email);
            $dataPet = $this->MTheInn->petStat($pet_id);
            $this->load->view('myPetS', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'data'=>$dataPet]);   
        }
    }


