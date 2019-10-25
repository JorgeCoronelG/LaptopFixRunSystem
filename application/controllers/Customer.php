<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Customer');
    }
    
    public function insert(){
        $json = array();
        $param = array();
        $param['correo'] = $this->input->post('email');
        $param['clave'] = md5($this->input->post('password'));
        $param['estatus'] = 1;
        $param['tipoUsuario'] = 2;
        $this->User->insert($param);
        
        $param['id'] = $this->input->post('id');
        $param['nombre'] = $this->input->post('name');
        $param['telefono'] = $this->input->post('phone');
        
        $this->Customer->insert($param);
        
        $json['code'] = 5;
        echo json_encode($json);
    }
    
    public function update(){
        $json = array();
        $param = array();
        $param['id'] = $this->input->post('id');
        $param['nombre'] = $this->input->post('name');
        $param['telefono'] = $this->input->post('phone');
        $this->Customer->update($param);
        $json['code'] = 6;
        echo json_encode($json);
    }
    
}