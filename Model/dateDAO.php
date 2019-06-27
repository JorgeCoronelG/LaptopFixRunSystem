<?php
/**
 * Description of DateDAO
 *
 * @author Jorge Coronel González
 */
require_once 'connection.php';
require_once 'dateBEAN.php';
class DateDAO extends Connection {

    function __construct() {
        parent::__construct();
    }
    
    public function insert($date){
        $query = "INSERT INTO DATE_CUS VALUES(null,"
                . "".$date->getIdCus().","
                . "'".$date->getDateCus()."',"
                . "'".$date->getHourCus()."',"
                . "'".$date->getResidenceCus()."',"
                . "'".$date->getDescProblem()."')";
        if(mysqli_query($this->connection, $query) === TRUE){
            $this->closeConnection();
            return $date;
        }else{
            $this->closeConnection();
            return FALSE;
        }
    }
    
    public function checkHourDates($date, $hour){
        $query = "SELECT * FROM DATE_CUS WHERE dateCus = '$date' AND hourCus = '$hour'";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public function getDates(){
        $query = "SELECT * FROM DATE_CUS WHERE idDate IN (SELECT idDate FROM DATE_CUS WHERE dateCus = curdate() AND hourCus >= curtime()) "
                . "OR idDate IN (SELECT idDate FROM DATE_CUS WHERE dateCus = curdate() + 1)";
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