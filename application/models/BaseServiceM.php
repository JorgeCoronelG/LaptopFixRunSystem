<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseServiceM extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function update($payment){
        $campo = array(
            'baseService' => $payment
        );
        $this->db->update('BASE_SERVICE', $campo);
        return TRUE;
    }
    
    public function get(){
        $this->db->select('*');
        $this->db->from('BASE_SERVICE');
        $result = $this->db->get();
        return $result->result();
    }
    
}