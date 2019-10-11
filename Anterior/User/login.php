<?php

/**
 * Description of userDAO
 *
 * @author Jorge Coronel González
 */

require_once '../Model/userBEAN.php';
require_once '../Model/userDAO.php';
require_once '../Model/customerBEAN.php';
require_once '../Model/customerDAO.php';
require_once '../Model/technicalBEAN.php';
require_once '../Model/technicalDAO.php';

$json = array();

if(isset($_POST['email']) && isset($_POST['password'])){
    $user = new UserBEAN();
    $user->setEmail($_POST['email']);
    $user->setPassword(md5($_POST['password']));
    $userDao = new UserDAO();
    $user = $userDao->login($user);
    if(!is_null($user)){
        if($user->getStatus() == 1){
            if($user->getIdTypeUser() == 1){
                $json['code'] = 200;
                $json['user']['email'] = $user->getEmail();
                $json['user']['typeUser'] = $user->getIdTypeUser();
            }else if($user->getIdTypeUser() == 2){
                $customerDao = new CustomerDAO();
                $customer = $customerDao->getCustomerByEmail($user->getEmail());
                if(!is_null($customer)){
                    $json['code'] = 200;
                    $json['user']['id'] = $customer->getIdCus();
                    $json['user']['name'] = utf8_encode($customer->getNameCus());
                    $json['user']['number'] = $customer->getNumberCus();
                    $json['user']['email'] = $user->getEmail();
                    $json['user']['typeUser'] = $user->getIdTypeUser();
                }else{
                    $json['code'] = 404;
                    $json['message'] = "Datos no encontrados";
                }
            }else if($user->getIdTypeUser() == 3){
                $technicalDao = new TechnicalDAO();
                $technical = $technicalDao->getTechnicalByEmail($user->getEmail());
                if(!is_null($technical)){
                    $json['code'] = 200;
                    $json['user']['id'] = $technical->getIdTech();
                    $json['user']['name'] = $technical->getNameTech();
                    $json['user']['number'] = $technical->getTelTech();
                    $json['user']['email'] = $technical->getEmailTech();
                    $json['user']['typeUser'] = $user->getIdTypeUser();
                }else{
                    $json['code'] = 404;
                    $json['message'] = "Datos no encontrados";
                }
            }
        }else{
            $json['code'] = 404;
            $json['message'] = "Tu usuario está dado de baja";
        }
    }else{
        $json['code'] = 404;
        $json['message'] = "Correo y/o contraseña incorrectos";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);

?>