<?php

require_once '../Model/userBEAN.php';
require_once '../Model/userDAO.php';
require_once '../Model/customerBEAN.php';
require_once '../Model/customerDAO.php';

$json = array();

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['number'])){
    $customer = new CustomerBEAN();
    $customer->setIdCus($_POST['id']);
    $customer->setNameCus($_POST['name']);
    $customer->setNumberCus($_POST['number']);
    
    $customerDao = new CustomerDAO();
    $customer = $customerDao->update($customer);
    
    if($customer != FALSE){
        $json['code'] = 200;
        $json['customer']['name'] = $customer->getNameCus();
        $json['customer']['number'] = $customer->getNumberCus();
    }else{
        $json['code'] = 404;
        $json['message'] = "Error. Vuelva a intentar más tarde";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);

?>