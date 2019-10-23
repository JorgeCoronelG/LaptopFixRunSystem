<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mCustomer extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idCus' => $param['id'],
            'nameCus' => $param['nombre'],
            'phoneCus' => $param['telefono'],
            'email' => $param['correo']
        );
        $this->db->insert('CUSTOMER', $campos);
        return TRUE;
    }
    
    public function update($param){
        $campos = array(
            'nameCus' => $param['nombre'],
            'phoneCus' => $param['telefono']
        );
        $this->db->where('idCus', $param['id']);
        $this->db->update('CUSTOMER', $campos);
        return TRUE;
    }
    
    public function getCustomer($id){
        $this->db->select('*');
        $this->db->from('CUSTOMER');
        $this->db->where('idCus', $id);
        $result = $this->db->get();
        return $result->row();
    }
    
    public function getCustomerByEmail($email){
        $this->db->select('*');
        $this->db->from('CUSTOMER');
        $this->db->where('email', $email);
        $result = $this->db->get();
        return $result->row();
    }
}