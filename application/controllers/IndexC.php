<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexC extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('UserM');
        if($this->session->userdata('user')){
            redirect(base_url().'AdminC');
        }
    }

    public function index(){
        $this->load->view('Login');
    }

    public function login(){
        $param = array();
        $param['email'] = $this->input->post('txtUser');
        $param['password'] = md5($this->input->post('txtPassword'));
        $result = $this->UserM->login($param);
        if($result != NULL){
            $data = array(
                'user' => $result->email
            );
            //SESSION
            $this->session->set_userdata($data);
            
            $url = base_url()."Admin";
            redirect($url);
        }else{
            $data = array();
            $data['message'] = "Correo electrónico / Contraseña incorrectos";
            $this->load->view('Login', $data);
        }
    }
}