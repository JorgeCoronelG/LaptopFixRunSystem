<?php
/**
 * Description of dateHomeBEAN
 *
 * @author Jorge Coronel González
 */
class DateHomeBEAN {
    
    private $idDateH;
    private $idCus;
    private $dateCus;
    private $hourCus;
    private $residenceCus;
    private $descProblem;
    private $service;
    
    function getIdDateH() {
        return $this->idDateH;
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

    function getResidenceCus() {
        return $this->residenceCus;
    }

    function getDescProblem() {
        return $this->descProblem;
    }

    function getService() {
        return $this->service;
    }

    function setIdDateH($idDateH) {
        $this->idDateH = $idDateH;
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

    function setResidenceCus($residenceCus) {
        $this->residenceCus = $residenceCus;
    }

    function setDescProblem($descProblem) {
        $this->descProblem = $descProblem;
    }

    function setService($service) {
        $this->service = $service;
    }
    
}