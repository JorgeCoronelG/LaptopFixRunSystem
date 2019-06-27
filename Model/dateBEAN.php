<?php
/**
 * Description of DateBEAN
 *
 * @author Jorge Coronel González
 */
class DateBEAN {
    private $idDate;
    private $idCus;
    private $dateCus;
    private $hourCus;
    private $residenceCus;
    private $descProblem;
    
    function getIdDate() {
        return $this->idDate;
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

    function setIdDate($idDate) {
        $this->idDate = $idDate;
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

}