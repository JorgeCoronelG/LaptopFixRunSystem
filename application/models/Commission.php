<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission extends CI_Model {
    
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
    
}