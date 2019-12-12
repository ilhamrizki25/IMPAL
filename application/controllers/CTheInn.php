<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTheInn extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('MTheInn');
     }
    public function index()
    {
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MTheInn->getIGN($email);
        $dataGold = $this->MTheInn->getGold($email);
        $dataPet = $this->MTheInn->yourPet($dataIGN);
        $cDataPet = $this->MTheInn->CyourPet($dataIGN);
        if ($cDataPet == 0){
            $kalimat = "You don't have any pet <br> Please buy pet first!";
            $this->load->view('VTheInn0', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'kalimat'=>$kalimat]);  
        }else{
            $this->load->view('VTheInn', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'data'=>$dataPet]);   
        }
        
    }

    public function selected($pet_id)
    {
        echo $pet_id;
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MTheInn->getIGN($email);
        $dataGold = $this->MTheInn->getGold($email);
        echo $pet_id;
        echo $pet_id;
        $dataPet = $this->MTheInn->petStat($pet_id);
        $this->load->view('VTheInn2', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'data'=>$dataPet]);   
    }

    public function getForm(){
        $form_data = $this->input->post();
        $pet_id = $this->input->post("pet");
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MTheInn->getIGN($email);
        $dataGold = $this->MTheInn->getGold($email);
        $dataPet = $this->MTheInn->petStat($pet_id);
        $this->load->view('VTheInn2', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'data'=>$dataPet]);   
    }

    public function Rest(){
        $form_data = $this->input->post();
        $pet_id = $this->input->post("pet");
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MTheInn->getIGN($email);
        $dataGold = $this->MTheInn->getGold($email);
        $dataPet = $this->MTheInn->petStatsta($pet_id);
        $dataPetMax = $this->MTheInn->petStatstamax($pet_id);
        $duration =  $this->input->post("duration");
        $dataPet = (int)$dataPet;
        $duration = (int)$duration;
        $staRec = 0;
        $dataGold = (int)$dataGold;
        $price = 2 * $duration;
        $dataGold = $dataGold - $price;
        if ($price > $dataGold){
            $this->load->view('VTheInn4');
        }
        else{
            $this->MTheInn->updateGold($dataGold, $dataIGN);
            if ($dataPet + $duration >= $dataPetMax){
                $staRec =  $dataPetMax - $dataPet;
                $this->MTheInn->updateStamina($pet_id,  $dataPetMax);
            }
            else{
                $staRec = $duration;
                $stamina = $dataPet + $duration;
                $this->MTheInn->updateStamina($pet_id, $stamina);
            }
        }
        $this->load->view('VTheInn3', ['stamina'=> $staRec, 'IGN'=> $dataIGN, 'Gold'=> $dataGold]);
    }


    

}