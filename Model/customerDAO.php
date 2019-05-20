<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customerDAO
 *
 * @author osval
 */
require_once 'connection.php';
class customerDAO {
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($customer){
        $querry = "INSERT INTO CUSTOMER VALUES (null,"
                . "'". $customer->getNameCus()."',"
                . "'". $customer->getNumberCus()."',"
                . "'". $customer->getEmail().")";
        
        if(mysqli_query($this->connection, $query) === TRUE){
            $this->closeConnection();
            return TRUE;
        }else{
            $this->closeConnection();
            return FALSE;
        }
                
        
    }
    
}
