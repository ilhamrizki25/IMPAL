<?php

class MBattle extends CI_Model {

public function getData($Email){
    $this->db->select('*');
    $this->db->from('account');
    if(!is_null($Email)){
        $this->db->where('Email',$Email);
    }
    return $this->db->get()->result();
    }

    public function yourPet($IGN){
        $this->db->select('*');
        $this->db->from('pet');
        $this->db->join('account', 'account.IGN = pet.IGN');
        $this->db->where('pet.IGN', $IGN);
        return $query = $this->db->get()->result();
        }

}