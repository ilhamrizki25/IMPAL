<?php

class EquipmentModel extends CI_Model {
    private $_table = "equipment";
    public function getAll(){
        return $this->db->get($this->_table)->result_array();
    }
    public function getAllbyId($id){
        $this->db->select('*');
        $this->db->from($this->_table);
        if(!is_null($id)){
            $this->db->where('id_Equipment',$id);
        }
        return $this->db->get()->result_array();
    }
    public function get_hp($id){
        $this->db->select('HP');
        $this->db->from($this->_table);
        if(!is_null($id)){
            $this->db->where('id_Equipment',$id);
        }
        return $this->db->get()->row();
    }
    public function get_attack($id){
        $this->db->select('Attack');
        $this->db->from($this->_table);
        if(!is_null($id)){
            $this->db->where('id_Equipment',$id);
        }
        return $this->db->get()->row();
    }
    public function get_price($id){
        $this->db->select('price');
        $this->db->from($this->_table);
        if(!is_null($id)){
            $this->db->where('id_Equipment',$id);
        }
        return $this->db->get()->row();
    }
    public function buy($data){
        return $this->db->insert('warehouse', $data);
    } 
}