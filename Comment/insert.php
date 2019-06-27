<?php
/**
 * Description of insert
 *
 * @author Jorge Coronel González
 */

require_once '../Model/commentBEAN.php';
require_once '../Model/commentDAO.php';

$json = array();

if(isset($_POST['comment']) && isset($_POST['score']) && isset($_POST['idCus'])){
    $comment = new CommentBEAN();
    $comment->setComment($_POST['comment']);
    $comment->setScore($_POST['score']);
    $comment->setIdCus($_POST['idCus']);
    
    $commentDAO = new CommentDAO();
    $comment = $commentDAO->insert($comment);
    if($comment != FALSE){
        $json['code'] = 200;
    }else{
        $json['code'] = 404;
        $json['message'] = "Error. Vuelva a intentar más tarde";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);