<?php

class WerehouseModel extends CI_Model {
    private $_table = 'warehouse';
    public function getAll(){
        return $this->db->get($this->_table)->result_array();
    }
    public function getAllbyIGN($ign){
        $this->db->select('*');
        $this->db->from($this->_table);
        if(!is_null($ign)){
            $this->db->where('IGN',$ign);
        }
        return $this->db->get()->result_array();
    }
    public function getidbyIGN($ign){
        $this->db->select('id_Equiment');
        $this->db->from($this->_table);
        if(!is_null($ign)){
            $this->db->where('IGN',$ign);
        }
        return $this->db->get()->result_array();
    }
    public function getEquipment($IGN){
        $this->db->select('*');
        $this->db->from('warehouse');
        $this->db->join('equipment', 'warehouse.id_Equipment = equipment.id_Equipment');
        $this->db->where('warehouse.IGN', $IGN);
        $query = $this->db->get()->result_object();
        return $query;
    }

}