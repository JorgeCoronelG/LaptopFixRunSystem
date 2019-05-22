<?php

/**
 * Description of typeUserBEAN
 *
 * @author osval
 */
class TypeUserBEAN {
    
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
