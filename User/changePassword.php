<?php
/**
 * Description of changePassword
 *
 * @author Jorge Coronel González
 */
require_once '../Model/userBEAN.php';
require_once '../Model/userDAO.php';

$json = array();

if(isset($_POST['email']) && isset($_POST['password'])){
    $user = new UserBEAN();
    $user->setEmail($_POST['email']);
    $user->setPassword(md5($_POST['password']));
    $userDao = new UserDAO();
    if($userDao->changePassword($user)){
        $json['code'] = 200;
    }else{
        $json['code'] = 404;
        $json['message'] = "Error. Inténtelo de nuevo";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);

?>