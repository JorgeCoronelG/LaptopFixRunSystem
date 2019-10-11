<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cIndex extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('mUser');
    }

    public function index(){
        $this->load->view('vLogin');
    }

    public function login(){
        $param = array();
        $param['email'] = $this->input->post('txtUser');
        $param['password'] = md5($this->input->post('txtPassword'));
        $result = $this->mUser->login($param);
        if($result != NULL){
            $data = array(
                'user' => $result->email
            );
            //SESSION
            $this->session->set_userdata($data);
            
            $url = base_url()."cAdmin";
            redirect($url);
        }else{
            $data = array();
            $data['message'] = "Correo electrónico / Contraseña incorrectos";
            $this->load->view('vLogin', $data);
        }
    }
}