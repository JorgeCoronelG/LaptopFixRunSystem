<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FiscalDataM extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idCus' => $param['id'],
            'name' => $param['nombre'],
            'address' => '',
            'phone' => $param['telefono'],
            'rfc' => '',
            'cfdi' => 'G03',
            'email' => $param['correo']
        );
        $this->db->insert('FISCAL_DATA', $campos);
        return TRUE;
    }
    
    public function update($param){
        $campos = array(
            'name' => $param['nombre'],
            'address' => $param['domicilio'],
            'phone' => $param['telefono'],
            'rfc' => $param['rfc'],
            'cfdi' => $param['cfdi'],
            'email' => $param['correo']
        );
        $this->db->where('idCus', $param['cliente']);
        $this->db->update('FISCAL_DATA', $campos);
        return TRUE;
    }
    
    public function get($id){
        $this->db->select('*');
        $this->db->from('FISCAL_DATA');
        $this->db->where('idCus', $id);
        $result = $this->db->get();
        return $result->row();
    }
    
}