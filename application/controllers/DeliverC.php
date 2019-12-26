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
        $tecnico = $this->input->post('idTech');
        $param['tecnico'] = $tecnico;
        $this->DeliverM->insert($param);
        
        $payment = array();
        $payment['servicio'] = $param['servicio'];
        $comision = $this->CommissionM->get($tecnico);
        $payment['pago'] = (($param['costo'] + $this->input->post('baseService')) * $comision->commission) / 100;
        $payment['id'] = $tecnico;
        $this->PaymentM->insert($payment);
        
        $json['code'] = 13;
        echo json_encode($json);
    }
    
    public function get(){
        $json = array();
        $id = $this->input->post('idDateH');
        $deliver = $this->DeliverM->get($id);
        $json['code'] = 17;
        $json['deliver']['idDel'] = $deliver->idDel;
        $json['deliver']['idDateH'] = $deliver->idDateH;
        $json['deliver']['dateDel'] = $deliver->dateDel;
        $json['deliver']['descDel'] = $deliver->descDel;
        $json['deliver']['costDel'] = $deliver->costDel;
        $json['deliver']['idTech'] = $deliver->idTech;
        echo json_encode($json);
    }
    
}