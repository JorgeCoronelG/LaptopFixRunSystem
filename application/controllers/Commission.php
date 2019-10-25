<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commission extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Commission');
    }
    
    public function update(){
        $param = array();
        $param['id'] = $this->input->post('id');
        $param['comision'] = $this->input->post('commission');
        $this->Commission->update($param);
        echo TRUE;
    }
    
}