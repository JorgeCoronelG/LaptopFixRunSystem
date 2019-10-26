<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserC extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('UserM');
        $this->load->model('CustomerM');
        $this->load->model('TechnicalM');
    }
    
    public function login(){
        $json = array();
        $param = array();
        $param['email'] = $this->input->post('email');
        $param['password'] = md5($this->input->post('password'));
        $user = $this->UserM->login($param);
        if($user != NULL){
            if($user->status == 1){
                switch($user->idTypeUser){
                    case 1:
                        $json['code'] = 1;
                        $json['user']['email'] = $user->email;
                        $json['user']['typeUser'] = $user->idTypeUser;
                        break;
                    case 2:
                        $customer = $this->CustomerM->getCustomerByEmail($user->email);
                        if($customer != null){
                            $json['code'] = 2;
                            $json['user']['id'] = $customer->idCus;
                            $json['user']['name'] = $customer->nameCus;
                            $json['user']['phone'] = $customer->phoneCus;
                            $json['user']['email'] = $user->email;
                            $json['user']['typeUser'] = $user->idTypeUser;
                        }else{
                            $json['code'] = 404;
                            $json['message'] = "Datos no encontrados";
                        }
                        break;
                    case 3:
                        $technical = $this->TechnicalM->getTechnicalByEmail($user->email);
                        if($technical != null){
                            $json['code'] = 3;
                            $json['user']['id'] = $technical->idTech;
                            $json['user']['name'] = $technical->nameTech;
                            $json['user']['number'] = $technical->phoneTech;
                            $json['user']['email'] = $user->email;
                            $json['user']['typeUser'] = $user->idTypeUser;
                        }else{
                            $json['code'] = 404;
                            $json['message'] = "Datos no encontrados";
                        }
                        break;
                }
            }else{
                $json['code'] = 404;
                $json['message'] = "Tu usuario está dado de baja";
            }
        }else{
            $json['code'] = 404;
            $json['message'] = "Correo y/o contraseña incorrectos";
        }
        echo json_encode($json);
    }
    
    public function changeEmail(){
        $json = array();
        $param = array();
        $param['correoN'] = $this->input->post('emailN');
        $param['correoV'] = $this->input->post('emailV');
        $this->UserM->changeEmail($param);
        $json['email'] = $param['correoN'];
        $json['code'] = 13;
        echo json_encode($json);
    }
    
    public function changePassword(){
        $json = array();
        $param = array();
        $param['email'] = $this->input->post('email');
        $param['password'] = md5($this->input->post('password'));
        $this->UserM->changePassword($param);
        $json['code'] = 4;
        echo json_encode($json);
    }
    
    public function changeStatus(){
        $param = array();
        $param['status'] = $this->input->post('status');
        $param['email'] = $this->input->post('email');
        $this->UserM->changeStatus($param);
        echo TRUE;
    }
    
}