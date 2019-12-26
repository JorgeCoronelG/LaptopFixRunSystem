<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentM extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($param){
        $campos = array(
            'idTech' => $param['id'],
            'payment' => $param['pago'],
            'idDateH' => $param['servicio'],
            'status' => 0
        );
        $this->db->insert('PAYMENT', $campos);
        return TRUE;
    }
    
    public function findAll(){
        $this->db->select('p.*, t.*');
        $this->db->from('PAYMENT p');
        $this->db->join('TECHNICAL t', 'p.idTech = t.idTech');
        $this->db->where('p.status', 0);
        $this->db->order_by('t.nameTech', 'ASC');
        $result = $this->db->get();
        return $result->result();
    }
    
    public function update($param){
        $campo = array(
            'status' => 1
        );
        $where = array(
            'idTech' => $param['tecnico'],
            'idDateH' => $param['servicio']
        );
        $this->db->where($where);
        $this->db->update('PAYMENT', $campo);
        return TRUE;
    }
    
}