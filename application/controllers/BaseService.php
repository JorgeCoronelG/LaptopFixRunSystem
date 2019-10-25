<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseService extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('BaseService');
    }
    
    public function actualizar(){
        $payment = $this->input->post('payment');
        $this->BaseService->update($payment);
        echo TRUE;
    }
    
    public function obtener(){
        echo json_encode($this->BaseService->get());
    }
    
}