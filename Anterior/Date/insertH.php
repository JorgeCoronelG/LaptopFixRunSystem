<?php

/**
 * Description of insert
 *
 * @author Jorge Coronel González
 */

require_once '../Model/dateHomeBEAN.php';
require_once '../Model/dateHomeDAO.php';

$json = array();

if(isset($_POST['idCus']) && isset($_POST['date']) && isset($_POST['hour']) && isset($_POST['residence']) 
        && isset($_POST['problem']) && isset($_POST['service'])){
    $date = new DateHomeBEAN();
    $date->setIdCus($_POST['idCus']);
    $date->setDateCus($_POST['date']);
    $date->setHourCus($_POST['hour']);
    $date->setResidenceCus($_POST['residence']);
    $date->setDescProblem($_POST['problem']);
    $date->setService($_POST['service']);
    
    $dateDAO = new DateHomeDAO();
    $date = $dateDAO->insert($date);
    
    if($date != FALSE){
        $json['code'] = 200;
        $json['date']['id'] = $date->getIdDateH();
        $json['date']['date'] = $date->getDateCus();
        $json['date']['hour'] = $date->getHourCus();
        $json['date']['residence'] = $date->getResidenceCus();
        $json['date']['problem'] = $date->getDescProblem();
        $json['date']['service'] = $date->getService();
    }else{
        $json['code'] = 404;
        $json['message'] = "Error. Vuelva a intentar más tarde";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);