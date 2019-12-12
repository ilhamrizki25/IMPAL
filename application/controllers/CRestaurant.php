<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRestaurant extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('MRestaurant');
     }
    public function index()
    {
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MRestaurant->getIGN($email);
        $dataGold = $this->MRestaurant->getGold($email);
        $dataPet = $this->MRestaurant->yourPet($dataIGN);
        $cDataPet = $this->MRestaurant->CyourPet($dataIGN);
        if ($cDataPet == 0){
            $kalimat = "You don't have any pet <br> Please buy pet first!";
            $this->load->view('VRestaurant0', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'kalimat'=>$kalimat]);
        } 
        else{
            $this->load->view('VRestaurant', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'data'=>$dataPet]); 
        }
          
    }

    public function selected($pet_id)
    {
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MRestaurant->getIGN($email);
        $dataGold = $this->MRestaurant->getGold($email);
        $dataPet = $this->MRestaurant->petStat($pet_id);
        $this->load->view('VRestaurant2', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'data'=>$dataPet]);   
    }

    public function getForm(){
        $form_data = $this->input->post();
        $pet_id = $this->input->post("pet");
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MRestaurant->getIGN($email);
        $dataGold = $this->MRestaurant->getGold($email);
        $dataPet = $this->MRestaurant->petStat($pet_id);
        $dataFood = $this->MRestaurant->getFood();
        $this->load->view('VRestaurant2', ['IGN'=> $dataIGN, 'Gold'=> $dataGold, 'data'=>$dataPet, 'food'=>$dataFood]);   
    }

    public function Eat(){
        $form_data = $this->input->post();
        $pet_id = $this->input->post("pet");
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MRestaurant->getIGN($email);
        $dataGold = $this->MRestaurant->getGold($email);
        $dataPet = $this->MRestaurant->petStatHP($pet_id);
        $dataPetmaxHP = $this->MRestaurant->petStatmaxHP($pet_id);
        $foodid =  $this->input->post("foodid");
        $dataPet = (int)$dataPet;
        $foodid = (int)$foodid;
        $hpRec = 0;
        $dataGold = (int)$dataGold;
        $selectedFood = $this->MRestaurant->sgetFood($foodid);
        $price = (int)$this->MRestaurant->sgetFoodprice($foodid);
        $recover = (int)$this->MRestaurant->sgetFoodHG($foodid);
        echo $price;
        echo $recover;
        $dataGold = $dataGold - $price;
        if ($price > $dataGold){
            $this->load->view('VRestaurant4');
        }
        else{
            $this->MRestaurant->updateGold($dataGold, $dataIGN);
            if ($dataPet + $recover >= $dataPetmaxHP ){
                $HpRec = $dataPetmaxHP - $dataPet ;
                $this->MRestaurant->updateHP($pet_id, $dataPetmaxHP);
            }
            else{
                $HpRec = $recover;
                $recoverT = $dataPet + $recover;
                $this->MRestaurant->updateHP($pet_id, $recoverT);
            }
        }
        $this->load->view('VRestaurant3', ['stamina'=> $HpRec, 'IGN'=> $dataIGN, 'Gold'=> $dataGold]);
    }


    

}