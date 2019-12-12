<?php

class PetModel extends CI_Model {
    private $_table = "pet";
    public function getAll(){
        return $this->db->get($this->_table)->result_array();
    }
    public function save($data){
        return $this->db->insert($this->_table, $data);
    }
    public function getAllbyId($ign){
        $this->db->select('*');
        $this->db->from($this->_table);
        if(!is_null($ign)){
            $this->db->where('IGN',$ign);
        }
        return $this->db->get()->result_array();
    }
}