<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FiscalDataC extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('FiscalDataM');
    }
    
    public function get(){
        $json = array();
        $id = $this->input->post('customer');
        $fiscalData = $this->FiscalDataM->get($id);
        if($fiscalData != NULL){
            $json['code'] = 15;
            $json['data']['customer'] = $fiscalData->idCus;
            $json['data']['name'] = $fiscalData->name;
            $json['data']['address'] = $fiscalData->address;
            $json['data']['phone'] = $fiscalData->phone;
            $json['data']['rfc'] = $fiscalData->rfc;
            $json['data']['cfdi'] = $fiscalData->cfdi;
            $json['data']['email'] = $fiscalData->email;
        }else{
            $json['code'] = 404;
            $json['message'] = "Datos no encontrados";
        }
        echo json_encode($json);
    }
    
    public function update(){
        $json = array();
        $param = array();
        $param['cliente'] = $this->input->post('customer');
        $param['nombre'] = $this->input->post('name');
        $param['domicilio'] = $this->input->post('address');
        $param['telefono'] = $this->input->post('phone');
        $param['rfc'] = $this->input->post('rfc');
        $param['cfdi'] = $this->input->post('cfdi');
        $param['correo'] = $this->input->post('email');
        $this->FiscalDataM->update($param);
        $json['code'] = 16;
        echo json_encode($json);
    }
    
}