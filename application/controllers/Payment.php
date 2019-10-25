<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Payment');
    }
    
    public function update(){
        $param = array();
        $param['id'] = $this->input->post('id');
        $param['payment'] = $this->input->post('payment');
        $this->Payment->update($param);
        echo TRUE;
    }
    
}