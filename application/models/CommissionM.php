<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommissionM extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idTech' => $param['id'],
            'commission' => $param['comision']
        );
        $this->db->insert('COMMISSION', $campos);
        return TRUE;
    }
    
    public function update($param){
        $campo = array(
            'commission' => $param['comision']
        );
        $this->db->where('idTech', $param['id']);
        $this->db->update('COMMISSION', $campo);
        return TRUE;
    }
    
    public function get($id){
        $this->db->select('*');
        $this->db->from('COMMISSION');
        $this->db->where('idTech', $id);
        $result = $this->db->get();
        return $result->row();
    }
    
}