<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommissionC extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CommissionM');
    }
    
    public function update(){
        $param = array();
        $param['id'] = $this->input->post('id');
        $param['comision'] = $this->input->post('commission');
        $this->CommissionM->update($param);
        echo TRUE;
    }
    
}