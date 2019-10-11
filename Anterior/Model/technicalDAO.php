<?php
/**
 * Description of technicalDAO
 *
 * @author Jorge Coronel González
 */
require_once 'connection.php';
require_once 'technicalBEAN.php';
class TechnicalDAO extends Connection {
    
    function __construct() {
        parent::__construct();
    }

    public function getTechnicalById($id){
        $query = "SELECT * FROM TECHNICAL WHERE id = '$id'";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            return NULL;
        }else{
            $dataTechnical = mysqli_fetch_array($result);
            $technicalBean = new TechnicalBEAN();
            $technicalBean->setIdTech($dataTechnical['idTech']);
            $technicalBean->setNameTech($dataTechnical['nameTech']);
            $technicalBean->setTelTech($technicalBean['telTech']);
            $technicalBean->setEmailTech($dataTechnical['email']);
            return $technicalBean;
        }
    }
    
    public function getTechnicalByEmail($email){
        $query = "SELECT * FROM TECHNICAL WHERE email = '$email'";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            return NULL;
        }else{
            $dataTechnical = mysqli_fetch_array($result);
            $technicalBean = new TechnicalBEAN();
            $technicalBean->setIdTech($dataTechnical['idTech']);
            $technicalBean->setNameTech(utf8_encode($dataTechnical['nameTech']));
            $technicalBean->setTelTech($dataTechnical['telTech']);
            $technicalBean->setEmailTech($dataTechnical['email']);
            return $technicalBean;
        }
    }
    
}