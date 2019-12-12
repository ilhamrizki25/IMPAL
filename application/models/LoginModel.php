<?php

class LoginModel extends CI_Model {
    public $_table='user';
    public function checkLogin($email, $password) {
        $this->db->where('Email', $email);
        $this->db->where('Password', $password);
        $query = $this->db->get('user');

        return $query->num_rows();
    }
    public function get_IGN($Email){
        $this->db->select('IGN');
        $this->db->from('user');
        if(!is_null($Email)){
            $this->db->where('Email',$Email);
        }
        return $this->db->get()->row();
    }
    public function get_Email($user){
        $this->db->select('Email');
        $this->db->from('user');
        if(!is_null($user)){
            $this->db->where('Username',$user);
        }
        return $this->db->get()->row();
    }
    public function checkLoginUsername($user, $password) {
        $this->db->where('Username', $user);
        $this->db->where('Password', $password);
        $query = $this->db->get('user');

        return $query->num_rows();
    }

}
