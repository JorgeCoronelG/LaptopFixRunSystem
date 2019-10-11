<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mDateH extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idCus' => $param['customer'],
            'date' => $param['fecha'],
            'hour' => $param['hora'],
            'address' => $param['domicilio'],
            'descProblem' => $param['problema'],
            'service' => $param['service'],
            'status' => $param['estatus']
        );
        $this->db->insert('DATE_H', $campos);
        return TRUE;
    }
    
}