<?php

/**
 * Description of insert
 *
 * @author Jorge Coronel González
 */

require_once '../Model/datelfBEAN.php';
require_once '../Model/datelfDAO.php';

$json = array();

if(isset($_POST['idCus']) && isset($_POST['date']) && isset($_POST['hour']) && isset($_POST['problem'])){
    $dateCusDAO = new DateLFDAO();
    if(!$dateCusDAO->checkHourDates($_POST['date'], $_POST['hour'])){
        $date = new DatelfBEAN();
        $date->setIdCus($_POST['idCus']);
        $date->setDateCus($_POST['date']);
        $date->setHourCus($_POST['hour']);
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
        $json['message'] = "Ya hay citas agendadas a esa hora. Intente en otro horario";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);