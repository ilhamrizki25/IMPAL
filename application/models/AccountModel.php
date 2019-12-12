<?php

class AccountModel extends CI_Model {
    private $_table = "account";	
    public function checkaccount($Email){
        $this->db->where('Email', $Email);
        $query = $this->db->get('account');
        return $query->num_rows();
    }
    public function save($data){
        return $this->db->insert($this->_table, $data);
    }
    public function getAll(){
        return $this->db->get($this->_table)->result_array();
    }
    public function getAllbyId($email){
        $this->db->select('*');
        $this->db->from($this->_table);
        if(!is_null($email)){
            $this->db->where('Email',$email);
        }
        return $this->db->get()->result_array();
    }
    public function get_gold($IGN){
        $this->db->select('Gold');
        $this->db->from($this->_table);
        if(!is_null($IGN)){
            $this->db->where('IGN',$IGN);
        }
        return $this->db->get()->row();
    }
    public function get_gem($IGN){
        $this->db->select('Gem');
        $this->db->from($this->_table);
        if(!is_null($IGN)){
            $this->db->where('IGN',$IGN);
        }
        return $this->db->get()->row();
    }
    public function get_IGN($Email){
        $this->db->select('IGN');
        $this->db->from($this->_table);
        if(!is_null($Email)){
            $this->db->where('Email',$Email);
        }
        return $this->db->get()->row();
    }
    public function get_jPet($Email){
        $this->db->select('jPet');
        $this->db->from($this->_table);
        if(!is_null($Email)){
            $this->db->where('Email',$Email);
        }
        return $this->db->get()->row();
    }
    public function update_gem($Email,$gem){
        $this->db->set('Gem',$gem);
        $this->db->where('Email' , $Email);
        $this->db->update($this->_table);
    }
    public function update_Gold($IGN,$gold){
        $this->db->set('Gold',$gold);
        $this->db->where('IGN' , $IGN);
        $this->db->update($this->_table);
    }
    public function update_Pet($IGN,$pet){
        $this->db->set('jPet',$pet);
        $this->db->where('IGN' , $IGN);
        $this->db->update($this->_table);
    }
    public function deletecharacter($IGN){
        return $this->db->delete($this->_table, array("IGN" => $IGN));
    }
}
