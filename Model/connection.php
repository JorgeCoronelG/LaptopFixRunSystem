<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connection
 *
 * @author osval
 */
class connection {
    
    public $connection;
    
    public function __construct() {
        $this->connection = mysqli_connect("localhost", "root", "", "lfr") or die("ERROR EN LA CONEXIÓN");
    }
    
    public function closeConnection(){
        mysqli_close($this->connection);
    }
}
