<?php
/**
 * Description of getDatesLaptopFix
 *
 * @author Jorge Coronel González
 */

require_once '../Model/dateBEAN.php';
require_once '../Model/dateDAO.php';

$json = array();

$dateDAO = new DateDAO();
$result = $dateDAO->getDatesLaptopFix();
if($result != FALSE){
    $json['code'] = 200;
    
    $arrDates = array();
    $dates = array();
    
    foreach($result as $d){
        $dates['id'] = $d['idDate'];
        $dates['customer'] = utf8_encode($d['nameCus']);
        $dates['date'] = $d['date'];
        $dates['hour'] = $d['hour'];
        $dates['residence'] = utf8_encode($d['residenceCus']);
        
        $arrDates[] = $dates;
    }
    
    $json['dates'] = $arrDates;
}else{
    $json['code'] = 404;
    $json['message'] = "No hay citas disponibles";
}

echo json_encode($json);