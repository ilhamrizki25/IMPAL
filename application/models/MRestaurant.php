<?php

class MRestaurant extends CI_Model {

public function getIGN($Email){
    $this->db->select('IGN');
    $this->db->from('account');
    $this->db->where('Email', $Email);
    return $this->db->get()->row()->IGN;
    }

    public function CyourPet($IGN){
        $this->db->select('jPet');
        $this->db->from('account');
        $this->db->where('IGN', $IGN);
        return $query = $this->db->get()->row()->jPet;
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

public function petStat($petID){
    $this->db->select('*');
    $this->db->from('pet');
    $this->db->where('pet_id', $petID);
    return $this->db->get()->result();
}

public function petStatHP($petID){
    $this->db->select('hp');
    $this->db->from('pet');
    $this->db->where('pet_id', $petID);
    return $this->db->get()->row()->hp;
}

public function petStatmaxHP($petID){
    $this->db->select('max_hp');
    $this->db->from('pet');
    $this->db->where('pet_id', $petID);
    return $this->db->get()->row()->max_hp;
}
public function petStatEXP($petID){
    $this->db->select('exp');
    $this->db->from('pet');
    $this->db->where('pet_id', $petID);
    return $this->db->get()->row()->exp;
}

public function updateHP($petID, $HP){
    $data = array(
        'hp' => $HP
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

public function getFood(){
    $this->db->select('*');
    $this->db->from('food');
    return $query = $this->db->get()->result();
}
public function sgetFood($foodid){
    $this->db->select('*');
    $this->db->from('food');
    $this->db->where('id_food', $foodid);
    return $query = $this->db->get()->result();
}
public function sgetFoodHG($foodid){
    $this->db->select('healthgain');
    $this->db->from('food');
    $this->db->where('id_food', $foodid);
    return $this->db->get()->row()->healthgain;
}
public function sgetFoodprice($foodid){
    $this->db->select('price');
    $this->db->from('food');
    $this->db->where('id_food', $foodid);
    return $this->db->get()->row()->price;
}
public function updateEXP($petID, $exp){
    $data = array(
        'exp' => $exp
    );
    $this->db->where('pet_id', $petID);
    $this->db->update('pet', $data);
    return true;
}
}