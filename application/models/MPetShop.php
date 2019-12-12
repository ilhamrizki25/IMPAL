<?php

class MPetShop extends CI_Model {

public function getData($Email){
    $this->db->select('IGN, Gold');
    $this->db->from('account');
    if(!is_null($Email)){
        $this->db->where('Email',$Email);
    }
    return $this->db->get()->result();
    }

public function getGold($Email){
    $this->db->select('Gold');
    $this->db->from('account');
    return $this->db->get()->result();
    }

public function buyPet($data){
    $sql = $this->db->set($data)->get_compiled_insert('pet');
}

}