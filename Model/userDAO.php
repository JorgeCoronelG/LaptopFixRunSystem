<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userDAO
 *
 * @author osval
 */
require_once 'connection.php';
class userDAO extends connection{
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($user){
        $querry = "INSERT INTO USER VALUES ("
                . "'".$user->getEmail()."',"
                . "'" .$user->getPassword()."',"
                . $user->getStatus().","
                . $user->getidTypeUser().")";
        
        if(mysqli_query($this->connection, $query) === TRUE){
            $this->closeConnection();
            return TRUE;
        }else{
            $this->closeConnection();
            return FALSE;
        }
                
    }
}
