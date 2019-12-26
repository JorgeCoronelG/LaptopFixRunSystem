<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BillC extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('BillM');
        $this->load->model('FiscalDataM');
    }
    
    public function insert(){
        $json = array();
        $param = array();
        $customer = $this->input->post('idCus');
        $fiscalData = $this->FiscalDataM->get($customer);
        $param['nombre'] = $fiscalData->name;
        $param['domicilio'] = $fiscalData->address;
        $param['telefono'] = $fiscalData->phone;
        $param['rfc'] = $fiscalData->rfc;
        $param['cfdi'] = $fiscalData->cfdi;
        $param['email'] = $fiscalData->email;
        $param['costo'] = $this->input->post('costBill');
        $param['entrega'] = $this->input->post('idDel');
        $this->BillM->insert($param);
        $json['code'] = 18;
        echo json_encode($json);
    }
    
    public function actualizar(){
        $this->BillM->changeStatus($this->input->post('id'));
        echo TRUE;
    }
    
    public function obtenerFacturas(){
        echo json_encode($this->BillM->findAll());
    }
    
}