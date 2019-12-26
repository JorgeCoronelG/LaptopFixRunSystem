<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentC extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('PaymentM');
    }
    
    public function update(){
        $param = array();
        $param['tecnico'] = $this->input->post('tecnico');
        $param['servicio'] = $this->input->post('servicio');
        $this->PaymentM->update($param);
        echo TRUE;
    }
    
    public function obtenerPagos(){
        echo json_encode($this->PaymentM->findAll());
    }
    
}