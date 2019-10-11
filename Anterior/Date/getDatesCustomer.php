<?php
/**
 * Description of getDatesCustomer
 *
 * @author Jorge Coronel González
 */

require_once '../Model/datelfBEAN.php';
require_once '../Model/datelfDAO.php';

$json = array();

if($_POST['id']){
    $dateDAO = new DateLFDAO();
    $result = $dateDAO->getDatesCustomer($_POST['id']);
    
    if($result != FALSE){
        $json['code'] = 200;
        
        $arrDates = array();
        $dates = array();
        
        foreach($result as $d){
            $dates['date'] = $d['date'];
            $dates['hour'] = $d['hour'];
            $dates['problem'] = utf8_encode($d['descProblem']);

            $arrDates[] = $dates;
        }
        
        $json['dates'] = $arrDates;
    }else{
        $json['code'] = 404;
        $json['message'] = "No hay citas agendadas";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);