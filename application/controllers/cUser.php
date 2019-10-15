<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cUser extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('mUser');
        $this->load->model('mCustomer');
        $this->load->model('mTechnical');
    }
    
    public function login(){
        $json = array();
        $param = array();
        $param['email'] = $this->input->post('email');
        $param['password'] = md5($this->input->post('password'));
        $user = $this->mUser->login($param);
        if($user != NULL){
            if($user->status == 1){
                switch($user->idTypeUser){
                    case 1:
                        $json['code'] = 200;
                        $json['user']['email'] = $user->email;
                        $json['user']['typeUser'] = $user->idTypeUser;
                        break;
                    case 2:
                        $customer = $this->mCustomer->getCustomerByEmail($user->email);
                        if($customer != null){
                            $json['code'] = 200;
                            $json['user']['id'] = $customer->idCus;
                            $json['user']['name'] = $customer->nameCus;
                            $json['user']['number'] = $customer->phoneCus;
                            $json['user']['email'] = $user->email;
                            $json['user']['typeUser'] = $user->idTypeUser;
                        }else{
                            $json['code'] = 404;
                            $json['message'] = "Datos no encontrados";
                        }
                        break;
                    case 3:
                        $technical = $this->mTechnical()->getTechnicalByEmail($user->email);
                        if($technical != null){
                            $json['code'] = 200;
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
    
    public function changeStatus(){
        $param = array();
        $param['status'] = $this->input->post('status');
        $param['email'] = $this->input->post('email');
        $this->mUser->changeStatus($param);
        echo TRUE;
    }
    
}