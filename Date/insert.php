<?php

/**
 * Description of insert
 *
 * @author Jorge Coronel González
 */

require_once '../Model/dateBEAN.php';
require_once '../Model/dateDAO.php';

$json = array();

if(isset($_POST['idCus']) && isset($_POST['date']) && isset($_POST['hour']) && isset($_POST['residence']) 
        && isset($_POST['problem'])){
    $dateCusDAO = new DateDAO();
    if(!$dateCusDAO->checkHourDates($_POST['date'], $_POST['hour'])){
        $date = new DateBEAN();
        $date->setIdCus($_POST['idCus']);
        $date->setDateCus($_POST['date']);
        $date->setHourCus($_POST['hour']);
        $date->setResidenceCus($_POST['residence']);
        $date->setDescProblem($_POST['problem']);

        $date = $dateCusDAO->insert($date);

        if($date != FALSE){
            $json['code'] = 200;
        }else{
            $json['code'] = 404;
            $json['message'] = "Error. Vuelva a intentar más tarde";
        }
    }else{
        $json['code'] = 404;
        $json['message'] = "Ya hay una cita agendada a esa hora. Intente en otro horario";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);