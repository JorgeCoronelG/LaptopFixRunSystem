<?php
/**
 * Description of technicalBEAN
 *
 * @author Jorge Coronel González
 */
class TechnicalBEAN {
    
    private $idTech;
    private $nameTech;
    private $telTech;
    private $emailTech;
    
    function getIdTech() {
        return $this->idTech;
    }

    function getNameTech() {
        return $this->nameTech;
    }

    function getTelTech() {
        return $this->telTech;
    }

    function getEmailTech() {
        return $this->emailTech;
    }

    function setIdTech($idTech) {
        $this->idTech = $idTech;
    }

    function setNameTech($nameTech) {
        $this->nameTech = $nameTech;
    }

    function setTelTech($telTech) {
        $this->telTech = $telTech;
    }

    function setEmailTech($emailTech) {
        $this->emailTech = $emailTech;
    }
    
}