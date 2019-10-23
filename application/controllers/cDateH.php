<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cDateH extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mDateH');
    }
    
    public function insert(){
        $json = array();
        $param = array();
        $param['cliente'] = $this->input->post('customer');
        $param['fecha'] = $this->input->post('date');
        $param['hora'] = $this->input->post('hour');
        $param['domicilio'] = $this->input->post('address');
        $param['problema'] = $this->input->post('problem');
        $param['servicio'] = $this->input->post('service');
        $json['id'] = $this->mDateH->insert($param);
        ($json['id'] != '') ? $json['code'] = "8" : $json['code'] = "404";
        echo json_encode($json);
    }
    
}
