<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerC extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('UserM');
        $this->load->model('CustomerM');
    }
    
    public function insert(){
        $json = array();
        $param = array();
        $param['correo'] = $this->input->post('email');
        $param['clave'] = md5($this->input->post('password'));
        $param['estatus'] = 1;
        $param['tipoUsuario'] = 2;
        $this->UserM->insert($param);
        
        $param['id'] = $this->input->post('id');
        $param['nombre'] = $this->input->post('name');
        $param['telefono'] = $this->input->post('phone');
        
        $this->CustomerM->insert($param);
        
        $json['code'] = 5;
        echo json_encode($json);
    }
    
    public function update(){
        $json = array();
        $param = array();
        $param['id'] = $this->input->post('id');
        $param['nombre'] = $this->input->post('name');
        $param['telefono'] = $this->input->post('phone');
        $this->CustomerM->update($param);
        $json['code'] = 6;
        echo json_encode($json);
    }
    
}