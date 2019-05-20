<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userBEAN
 *
 * @author osval
 */
class userBEAN {
    
    private $email;
    private $password;
    private $status;
    private $idTypeUser;
    
    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getStatus() {
        return $this->status;
    }

    function getIdTypeUser() {
        return $this->idTypeUser;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setIdTypeUser($idTypeUser) {
        $this->idTypeUser = $idTypeUser;
    }


    
}
