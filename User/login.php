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

$json = array();

if(isset($_POST['email']) && isset($_POST['password'])){
    $user = new UserBEAN();
    $user->setEmail($_POST['email']);
    $user->setPassword(md5($_POST['password']));
    $userDao = new UserDAO();
    $user = $userDao->login($user);
    if(!is_null($user)){
        if($user->getIdTypeUser() == 1){
            $json['code'] = 200;
            $json['user']['email'] = $user->getEmail();
            $json['user']['password'] = $user->getPassword();
            $json['user']['typeUser'] = $user->getIdTypeUser();
            $json['user']['status'] = $user->getStatus();
        }else if($user->getIdTypeUser() == 2){
            $customerDao = new CustomerDAO();
            $customer = $customerDao->getCustomerByEmail($user->getEmail());
            if(!is_null($customer)){
                $json['code'] = 200;
                $json['user']['id'] = $customer->getIdCus();
                $json['user']['name'] = utf8_encode($customer->getNameCus());
                $json['user']['number'] = $customer->getNumberCus();
                $json['user']['email'] = $user->getEmail();
                $json['user']['password'] = $user->getPassword();
                $json['user']['typeUser'] = $user->getIdTypeUser();
                $json['user']['status'] = $user->getStatus();
            }else{
                $json['code'] = 404;
                $json['message'] = "Datos no encontrados";
            }
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