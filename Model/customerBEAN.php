<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customerBEAN
 *
 * @author osval
 */
class customerBEAN {
    private $idCus;
    private $nameCus;
    private $numberCus;
    private $email;
    
    function getIdCus() {
        return $this->idCus;
    }

    function getNameCus() {
        return $this->nameCus;
    }

    function getNumberCus() {
        return $this->numberCus;
    }

    function getEmail() {
        return $this->email;
    }

    function setIdCus($idCus) {
        $this->idCus = $idCus;
    }

    function setNameCus($nameCus) {
        $this->nameCus = $nameCus;
    }

    function setNumberCus($numberCus) {
        $this->numberCus = $numberCus;
    }

    function setEmail($email) {
        $this->email = $email;
    }


    
}
