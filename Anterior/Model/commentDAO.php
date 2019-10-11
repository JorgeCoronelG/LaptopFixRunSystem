<?php
/**
 * Description of commentDAO
 *
 * @author Jorge Coronel González
 */
require_once 'commentBEAN.php';
require_once 'connection.php';
class CommentDAO extends Connection {
    
    function __construct() {
        parent::__construct();
    }

    public function insert($comment){
        $query = "INSERT INTO COMMENT VALUES(null,"
                . "'".utf8_decode($comment->getComment())."',"
                . "".$comment->getScore().","
                . "NOW(),"
                . "".$comment->getIdCus().")";
        if(mysqli_query($this->connection, $query) === TRUE){
            $comment->setIdCus(mysqli_insert_id($this->connection));
            $this->closeConnection();
            return $comment;
        }else{
            $this->closeConnection();
            return FALSE;
        }
    }
    
    public function getComments(){
        $query = "SELECT comment, score, DATE_FORMAT(dateComment, '%d-%m-%Y') AS date, nameCus "
                . "FROM COMMENT C INNER JOIN CUSTOMER CU ON C.idCus = CU.idCus ORDER BY dateComment DESC";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            $this->closeConnection();
            return FALSE;
        }else{
            $this->closeConnection();
            return $result;
        }
    }
    
}