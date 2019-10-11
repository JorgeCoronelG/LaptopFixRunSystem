<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mUser extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function insert($param){
        $campos = array(
            'email' => $param['correo'],
            'password' => $param['clave'],
            'status' => $param['estatus'],
            'idTypeUser' => $param['tipoUsuario']
        );
        $this->db->insert('USER', $campos);
        return TRUE;
    }

    public function login($param){
        $this->db->select('*');
        $this->db->from('USER');
        $this->db->where('email', $param['email']);
        $this->db->where('password', $param['password']);
        $result = $this->db->get();
        return $result->row();
    }
    
    public function changePassword($param){
        $campos = array(
            'password' => $param['password']
        );
        $this->db->where('email', $param['email']);
        $this->db->update('USER', $campos);
        return TRUE;
    }
    
    public function existEmail($email){
        $this->db->select('*');
        $this->db->from('USER');
        $this->db->where('email', $email);
        $result = $this->db->get();
        return $result->row();
    }

}