<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of typeUserBEAN
 *
 * @author osval
 */
class typeUserBEAN {
    
    private $idTypeUser;
    private $typeUser;
    
    function getIdTypeUser() {
        return $this->idTypeUser;
    }

    function getTypeUser() {
        return $this->typeUser;
    }

    function setIdTypeUser($idTypeUser) {
        $this->idTypeUser = $idTypeUser;
    }

    function setTypeUser($typeUser) {
        $this->typeUser = $typeUser;
    }


}
