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

if(isset($_POST['email']) || isset($_POST['password']) || isset($_POST['name']) || isset($_POST['number'])){
    $user = new UserBEAN();
    $user->setEmail($_POST['email']);
    $user->setPassword(md5($_POST['password']));
    $user->setStatus(0);
    $user->setIdTypeUser(2);//2 = Cliente

    $userDao = new UserDAO();

    if(!$userDao->existEmail($user->getEmail())){

        $user = $userDao->insert($user);

        if($user != FALSE){
            $customer = new CustomerBEAN();
            $customer->setEmail($user->getEmail());
            $customer->setNameCus($_POST['name']);
            $customer->setNumberCus($_POST['number']);

            $customerDao = new CustomerDAO();
            $customer = $customerDao->insert($customer);

            if($customer != FALSE){
                $json['code'] = 200;
                $json['customer']['id'] = $customer->getIdCus();
                $json['customer']['name'] = $customer->getNameCus();
                $json['customer']['number'] = $customer->getNumberCus();
                $json['customer']['email'] = $customer->getEmail();
            }else{
                $json['code'] = 404;
                $json['message'] = "Error. Vuelva a intentar más tarde";
            }
        }else{
            $json['code'] = 404;
            $json['message'] = "Error. Vuelva a intentar más tarde";
        }
    }else{
        $json['code'] = 404;
        $json['message'] = "Correo ya registrado";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);

?>