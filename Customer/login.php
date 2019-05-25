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
        $customerDao = new CustomerDAO();
        $customer = $customerDao->getCustomerByEmail($user->getEmail());
        if(!is_null($customer)){
            $json['code'] = 200;
            $json['customer']['id'] = $customer->getIdCus();
            $json['customer']['name'] = utf8_encode($customer->getNameCus());
            $json['customer']['number'] = $customer->getNumberCus();
            $json['customer']['email'] = $customer->getEmail();
        }else{
            $json['code'] = 404;
            $json['message'] = "Datos no encontrados";
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