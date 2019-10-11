<?php
/**
 * Description of getDatesLaptopFix
 *
 * @author Jorge Coronel González
 */

require_once '../Model/datelfBEAN.php';
require_once '../Model/datelfDAO.php';

$json = array();

$dateDAO = new DateLFDAO();
$result = $dateDAO->getDatesLaptopFix();
if($result != FALSE){
    $json['code'] = 200;
    
    $arrDates = array();
    $dates = array();
    
    foreach($result as $d){
        $dates['id'] = $d['idDateLF'];
        $dates['customer'] = utf8_encode($d['nameCus']);
        $dates['date'] = $d['date'];
        $dates['hour'] = $d['hour'];
        
        $arrDates[] = $dates;
    }
    
    $json['dates'] = $arrDates;
}else{
    $json['code'] = 404;
    $json['message'] = "No hay citas disponibles";
}

echo json_encode($json);