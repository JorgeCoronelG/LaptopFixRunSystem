<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeliverC extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('DeliverM');
        $this->load->model('CommissionM');
        $this->load->model('PaymentM');
    }
    
    public function insert(){
        $json = array();
        $param = array();
        $param['servicio'] = $this->input->post('dateH');
        $param['fecha'] = date("Y")."-".date("m")."-".date("d");
        $param['solucion'] = $this->input->post('desc');
        $param['costo'] = $this->input->post('cost');
        $this->DeliverM->insert($param);
        
        $payment = array();
        $tecnico = $this->input->post('idTech');
        $comision = $this->CommissionM->get($tecnico);
        $payment['payment'] = (($param['costo'] + $this->input->post('baseService')) * $comision->commission) / 100;
        $payment['id'] = $tecnico;
        $this->PaymentM->update($payment);
        
        $json['code'] = 13;
        echo json_encode($json);
    }
    
}