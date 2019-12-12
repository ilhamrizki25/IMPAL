<?php

class MAccount extends CI_Model {

public function getData($Email){
    $this->db->select('*');
    $this->db->from('account');
    if(!is_null($Email)){
        $this->db->where('Email',$Email);
    }
    return $this->db->get()->result();
    }

}