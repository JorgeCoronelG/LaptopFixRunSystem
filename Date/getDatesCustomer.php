<?php
/**
 * Description of getDatesCustomer
 *
 * @author Jorge Coronel González
 */

require_once '../Model/dateBEAN.php';
require_once '../Model/dateDAO.php';

$json = array();

if($_POST['id']){
    $dateDAO = new DateDAO();
    $result = $dateDAO->getDatesCustomer($_POST['id']);
    
    if($result != FALSE){
        $json['code'] = 200;
        
        $arrDates = array();
        $dates = array();
        
        foreach($result as $d){
            $dates['date'] = $d['date'];
            $dates['hour'] = $d['hour'];
            $dates['problem'] = utf8_encode($d['descProblem']);
            $dates['residence'] = utf8_encode($d['residenceCus']);

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