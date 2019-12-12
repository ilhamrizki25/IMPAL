<?php

class MTheInn extends CI_Model {

public function getIGN($Email){
    $this->db->select('IGN');
    $this->db->from('account');
    $this->db->where('Email', $Email);
    return $this->db->get()->row()->IGN;
    }

public function getGold($Email){
    $this->db->select('Gold');
    $this->db->from('account');
    $this->db->where('Email', $Email);
    return $this->db->get()->row()->Gold;
    }

public function yourPet($IGN){
    $this->db->select('*');
    $this->db->from('pet');
    $this->db->join('account', 'account.IGN = pet.IGN');
    $this->db->where('pet.IGN', $IGN);
    return $query = $this->db->get()->result();
    }

    public function CyourPet($IGN){
        $this->db->select('jPet');
        $this->db->from('account');
        $this->db->where('IGN', $IGN);
        return $query = $this->db->get()->row()->jPet;
    }




public function petStat($petID){
    $this->db->select('*');
    $this->db->from('pet');
    $this->db->where('pet_id', $petID);
    return $this->db->get()->result();
}

public function petStatsta($petID){
    $this->db->select('stamina');
    $this->db->from('pet');
    $this->db->where('pet_id', $petID);
    return $this->db->get()->row()->stamina;
}

public function petStatstamax($petID){
    $this->db->select('max_stamina');
    $this->db->from('pet');
    $this->db->where('pet_id', $petID);
    return $this->db->get()->row()->max_stamina;
}

public function updateStamina($petID, $stamina){
    $data = array(
        'stamina' => $stamina
    );
    $this->db->where('pet_id', $petID);
    $this->db->update('pet', $data);
    return true;
}

public function updateGold($gold, $IGN){
    $data = array(
        'gold' => $gold
    );
    $this->db->where('IGN', $IGN);
    $this->db->update('account', $data);
    return true;
}
}