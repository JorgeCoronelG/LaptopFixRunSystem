<?php
    require_once 'Model/userBEAN.php';
    require_once 'Model/userDAO.php';
    require_once 'Model/customerBEAN.php';
    require_once 'Model/customerDAO.php';
    
    $userBean = new userBEAN();
    $userBean->setEmail($_POST['email']);
    $userBean->setPassword($_POST['password']);
    $userBean->setStatus($_POST['status']);
    $userBean->setIdTypeUser(2);
    
    $customerBean = new customerBEAN();
    $customerBean->setEmail($userBean->getEmail());
    $customerBean->getNameCus($_POST['name']);
    $customerBean->getNumberCus($_POST['number']);
    
    
    
            

