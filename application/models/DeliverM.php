<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeliverM extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idDateH' => $param['servicio'],
            'dateDel' => $param['fecha'],
            'descDel' => $param['solucion'],
            'costDel' => $param['costo'],
            'idTech' => $param['tecnico']
        );
        $this->db->insert('DELIVER', $campos);
        return TRUE;
    }
    
    public function get($id){
        $this->db->select('*');
        $this->db->from('DELIVER');
        $this->db->where('idDateH', $id);
        $result = $this->db->get();
        return $result->row();
    }
    
}