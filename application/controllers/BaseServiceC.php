<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseServiceC extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('BaseServiceM');
    }
    
    public function actualizar(){
        $payment = $this->input->post('payment');
        $this->BaseServiceM->update($payment);
        echo TRUE;
    }
    
    public function obtener(){
        echo json_encode($this->BaseServiceM->get());
    }
    
    public function get(){
        $json = array();
        $json['code'] = 14;
        $bs = $this->BaseServiceM->get();
        $json['baseService'] = $bs->baseService;
        echo json_encode($json);
    }
    
}