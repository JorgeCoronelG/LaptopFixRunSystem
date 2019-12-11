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
            'costDel' => $param['costo']
        );
        $this->db->insert('DELIVER', $campos);
        return TRUE;
    }
    
}