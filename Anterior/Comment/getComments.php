<?php
/**
 * Description of getComments
 *
 * @author Jorge Coronel González
 */

require_once '../Model/commentBEAN.php';
require_once '../Model/commentDAO.php';

$json = array();

$commentDAO = new CommentDAO();
$result = $commentDAO->getComments();
if($result != FALSE){
    $json['code'] = 200;
    
    $arrComments = array();
    $comments = array();
    
    foreach($result as $s){
        $comments['comment'] = utf8_encode($s['comment']);
        $comments['score'] = $s['score'];
        $comments['date'] = $s['date'];
        $comments['nameCus'] = utf8_encode($s['nameCus']);
        $arrComments[] = $comments;
    }
    
    $json['comments'] = $arrComments;
}else{
    $json['code'] = 404;
    $json['message'] = "No hay comentarios disponibles";
}

echo json_encode($json);