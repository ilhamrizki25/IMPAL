<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Battle extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('MBattle');
        $this->load->model('MRestaurant');
        $this->load->model('MTheInn');
     }

    public function index()
    {
        $this->load->view('BattleMenu');      
    }

    public function Multiplication(){
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MRestaurant->getIGN($email);
        $dataPet = $this->MRestaurant->yourPet($dataIGN);
        $cDataPet = $this->MRestaurant->CyourPet($dataIGN);
        if ($cDataPet == 0){
            $kalimat = "You don't have any pet <br> Please buy pet first!";
            $this->load->view('Battle0', ['IGN'=> $dataIGN,  'kalimat'=>$kalimat]);
        } 
        else{
            $mode = "Multiplication";
            $this->load->view('BattleSelectPet', ['IGN'=> $dataIGN, 'mode'=>$mode, 'data'=>$dataPet]); 
        }
    }

    public function Addition(){
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MRestaurant->getIGN($email);
        $dataPet = $this->MRestaurant->yourPet($dataIGN);
        $cDataPet = $this->MRestaurant->CyourPet($dataIGN);
        if ($cDataPet == 0){
            $kalimat = "You don't have any pet <br> Please buy pet first!";
            $this->load->view('Battle0', ['IGN'=> $dataIGN,  'kalimat'=>$kalimat]);
        } 
        else{
            $mode = "Addition";
            $this->load->view('BattleSelectPet', ['IGN'=> $dataIGN, 'mode'=>$mode, 'data'=>$dataPet]); 
        }

    }
    public function Soal(){
        $mode=$this->input->post('mode');
        $idpet = $this->input->post('pet');
        $email = $this->session->userdata('Email');
        $dataIGN = $this->MTheInn->getIGN($email);
        $hp = $this->MRestaurant->petStatHP($idpet);
        $dataPet = $this->MTheInn->petStatsta($idpet);
        echo $mode; #ini keluar bener tapi if elsenya pepega
        if($mode=='Addition'){
            $angka1= rand(30,100);
            $angka2= rand(30,100);
            $newstamina = $dataPet-5;
            
            $jawaban = $angka1+$angka2;
            $operand = "+";
            if($dataPet<5){
                $this->session->set_flashdata('flash', 'Your pet doesn&apos;t have enough stamina');
                redirect(base_url() . 'Battle/Addition');
            }
            $this->MTheInn->updateStamina($idpet, $newstamina);
            $this->load->view('BattleG',['angka1'=>$angka1,'angka2'=>$angka2,'hp'=>$hp,'jawaban'=>$jawaban,'idpet'=>$idpet,'mode'=>$mode,'IGN'=>$dataIGN, 'operand'=>$operand]);
        }
        else if($mode=='Multiplication'){
            $angka1= rand(1,20);
            $angka2= rand(1,20);
            $newstamina = $dataPet-5;  
            $jawaban = $angka1*$angka2;  
            $operand = "X";
            if($dataPet<5){
                $this->session->set_flashdata('flash', 'Your pet doesn&apos;t have enough stamina');
                redirect(base_url() . 'Battle/Multiplication');
            }
            $this->MTheInn->updateStamina($idpet, $newstamina);
            $this->load->view('BattleG',['angka1'=>$angka1,'angka2'=>$angka2,'hp'=>$hp,'jawaban'=>$jawaban,'idpet'=>$idpet,'mode'=>$mode,'IGN'=>$dataIGN, 'operand'=>$operand]);
        }
        
        
    }
    public function validate(){
        $email = $this->session->userdata('Email');
        $userjawaban = $this->input->post('jawabanUser');
        $jawaban = $this->input->post('jawabanSoal');
        $idpet = $this->input->post('pet');
        if($userjawaban==$jawaban){
            $exp = $this->MRestaurant->petStatEXP($idpet);
            $newexp = $exp+10;
            $this->MRestaurant->updateEXP($idpet,$newexp);
            $dataGold = $this->MRestaurant->getGold($email);
            $newGold = $dataGold+12;
            $dataIGN = $this->MRestaurant->getIGN($email);
            $this->MRestaurant->updateGold($newGold,$dataIGN);
            $dataIGN = $this->MTheInn->getIGN($email);
            $dataPet = $this->MRestaurant->yourPet($dataIGN);
            $cDataPet = $this->MRestaurant->CyourPet($dataIGN);
            $kalimat = "Your pet Won a Battle <br> You will get 12 Gold and your pet gain 10 exp";
            if ($cDataPet > 0){
            foreach($dataPet as $d ){
                $idPet=$d->pet_id;
                $level=$d->level;
                $hp = $d->hp;
                $maxhp=$d->max_hp;
                $exp = $d->exp;
                $expUp = $d->exp_up;
                $stamina = $d->max_stamina;
                if($exp >= $expUp){
                    $kalimat = $kalimat + "<br> Your pet leveled up";
                    $newmaxhp = $maxhp+($maxhp*10/100);
                    $newlevel = $level+1;
                    $newmaxexp=$expUp+($expUp/2);
                    $this->MRestaurant->updateEXP($idPet,0);
                    $this->MRestaurant->updatemaxEXP($idPet,$newmaxexp);
                    $this->MRestaurant->updatLevel($idPet,$newlevel);
                    $this->MRestaurant->updatemaxHP($idPet,$newmaxhp);
                    $this->MRestaurant->updateHP($idPet,$newmaxhp);
                    $this->MRestaurant->updateStamina($idPet,$stamina);
                    }      
                }
            }
            
            $this->load->view('BattleSummary',['kalimat'=>$kalimat]);
        }else{
            $hp = $this->MRestaurant->petStatHP($idpet);
            $newhp = $hp-5;
            $this->MRestaurant->updateHP($idpet,$newhp);
            $kalimat = "Your pet Lose a Battle <br> Your pet lose 5 Hp";
            $this->load->view('BattleSummary',['kalimat'=>$kalimat]);
        }
    }



}