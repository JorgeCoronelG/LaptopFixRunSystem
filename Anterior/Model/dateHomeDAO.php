<?php
/**
 * Description of dateHomeDAO
 *
 * @author Jorge Coronel González
 */
require_once 'dateHomeBEAN.php';
require_once 'connection.php';
class DateHomeDAO extends Connection {
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($date){
        $query = "INSERT INTO DATE_H VALUES(null, "
                . "'".$date->getIdCus()."',"
                . "'".$date->getDateCus()."',"
                . "'".$date->getHourCus()."',"
                . "'".$date->getResidenceCus()."',"
                . "'".$date->getDescProblem()."',"
                . "".$date->getService().")";
        if(mysqli_query($this->connection, $query) === TRUE){
            $date->setIdDateH(mysqli_insert_id($this->connection));
            $this->closeConnection();
            return $date;
        }else{
            $this->closeConnection();
            return FALSE;
        }
    }
    
}