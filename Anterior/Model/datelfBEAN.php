<?php
/**
 * Description of DateBEAN
 *
 * @author Jorge Coronel González
 */
class DatelfBEAN {
    
    private $idDateLF;
    private $idCus;
    private $dateCus;
    private $hourCus;
    private $descProblem;
    
    function getIdDateLF() {
        return $this->idDateLF;
    }

    function getIdCus() {
        return $this->idCus;
    }

    function getDateCus() {
        return $this->dateCus;
    }

    function getHourCus() {
        return $this->hourCus;
    }

    function getDescProblem() {
        return $this->descProblem;
    }

    function setIdDateLF($idDateLF) {
        $this->idDateLF = $idDateLF;
    }

    function setIdCus($idCus) {
        $this->idCus = $idCus;
    }

    function setDateCus($dateCus) {
        $this->dateCus = $dateCus;
    }

    function setHourCus($hourCus) {
        $this->hourCus = $hourCus;
    }

    function setDescProblem($descProblem) {
        $this->descProblem = $descProblem;
    }

}