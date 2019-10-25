<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DateH extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idCus' => $param['cliente'],
            'date' => $param['fecha'],
            'hour' => $param['hora'],
            'address' => $param['domicilio'],
            'descProblem' => $param['problema'],
            'service' => $param['servicio'],
            'status' => 0
        );
        $this->db->insert('DATE_H', $campos);
        return $this->db->insert_id();
    }
    
}