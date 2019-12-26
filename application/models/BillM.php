<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillM extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'name' => $param['nombre'],
            'address' => $param['domicilio'],
            'phone' => $param['telefono'],
            'rfc' => $param['rfc'],
            'cfdi' => $param['cfdi'],
            'email' => $param['email'],
            'costBill' => $param['costo'],
            'idDel' => $param['entrega'],
            'status' => 0
        );
        $this->db->insert('BILL', $campos);
        return TRUE;
    }
    
    public function changeStatus($id){
        $campo = array(
            'status' => 1
        );
        $this->db->where('idBill', $id);
        $this->db->update('BILL', $campo);
        return TRUE;
    }
    
    public function findAll(){
        $this->db->select('*');
        $this->db->from('BILL');
        $this->db->where('status', 0);
        $result = $this->db->get();
        return $result->result();
    }
    
}