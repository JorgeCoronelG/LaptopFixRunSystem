<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idTech' => $param['id'],
            'payment' => $param['payment']
        );
        $this->db->insert('PAYMENT', $campos);
        return TRUE;
    }
    
    public function update($param){
        $sql = "UPDATE PAYMENT SET payment = payment + ".$param['payment']." "
                . "WHERE idTech = '".$param['id']."'";
        $this->db->query($sql);
        return TRUE;
    }
    
}