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
                . "'". utf8_decode($date->getResidenceCus())."',"
                . "'". utf8_decode($date->getDescProblem())."')";
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
    
    public function getDate($id){
        $query = "SELECT idDate, DATE_FORMAT(dateCus, '%d-%m-%Y') AS date, TIME_FORMAT(hourCus, '%h %i %p') AS hour, "
                . "residenceCus, descProblem, nameCus FROM DATE_CUS d INNER JOIN CUSTOMER c ON d.idCus = c.idCus "
                . "WHERE idDate = $id";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            $this->closeConnection();
            return FALSE;
        }else{
            $this->closeConnection();
            $dataDate = mysqli_fetch_array($result);
            $date = new DateBEAN();
            $date->setIdDate($dataDate['idDate']);
            $date->setIdCus($dataDate['nameCus']);
            $date->setDateCus($dataDate['date']);
            $date->setHourCus($dataDate['hour']);
            $date->setResidenceCus($dataDate['residenceCus']);
            $date->setDescProblem($dataDate['descProblem']);
            return $date;
        }
    }
    
    public function getDatesLaptopFix(){
        $query = "SELECT idDate, nameCus, DATE_FORMAT(dateCus, '%d-%m-%Y') AS date, TIME_FORMAT(hourCus, '%h %i %p') AS hour, residenceCus "
                . "FROM DATE_CUS d INNER JOIN CUSTOMER c ON d.idCus = c.idCus "
                . "WHERE idDate IN (SELECT idDate FROM DATE_CUS WHERE dateCus = curdate() AND hourCus >= curtime()) OR "
                . "idDate IN (SELECT idDate FROM DATE_CUS WHERE dateCus = curdate() + 1) ORDER BY date, hour";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            $this->closeConnection();
            return FALSE;
        }else{
            $this->closeConnection();
            return $result;
        }
    }
    
    public function getDatesCustomer($id){
        $query = "SELECT DATE_FORMAT(dateCus, '%d-%m-%Y') AS date, TIME_FORMAT(hourCus, '%h %i %p') AS hour, descProblem, residenceCus "
                . "FROM DATE_CUS WHERE idDate IN (SELECT idDate FROM DATE_CUS WHERE dateCus >= curdate()) AND idCUs = $id "
                . "ORDER BY date, hour";
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