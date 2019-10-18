<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cBaseService extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mBaseService');
    }
    
    public function actualizar(){
        $payment = $this->input->post('payment');
        $this->mBaseService->update($payment);
        echo TRUE;
    }
    
    public function obtener(){
        echo json_encode($this->mBaseService->get());
    }
    
}