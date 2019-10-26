<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentC extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('PaymentM');
    }
    
    public function update(){
        $param = array();
        $param['id'] = $this->input->post('id');
        $param['payment'] = $this->input->post('payment');
        $this->PaymentM->update($param);
        echo TRUE;
    }
    
}