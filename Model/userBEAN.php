<?php

/**
 * Description of userBEAN
 *
 * @author osval
 */
class UserBEAN {
    
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
