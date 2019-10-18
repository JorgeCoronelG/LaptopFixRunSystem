<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cCommission extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mCommission');
    }
    
    public function update(){
        $param = array();
        $param['id'] = $this->input->post('id');
        $param['comision'] = $this->input->post('commission');
        $this->mCommission->update($param);
        echo TRUE;
    }
    
}