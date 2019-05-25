<?php
/**
 * Description of connection
 *
 * @author osval
 */
class Connection {
    
    public $connection;
    
    public function __construct() {
        //$this->connection = mysqli_connect("localhost", "impactos_laptopf", "danjohn007", "impactos_laptopfixrun") or die("ERROR EN LA CONEXIÓN");
        $this->connection = mysqli_connect("localhost", "root", "", "lfr") or die("ERROR EN LA CONEXIÓN");
    }
    
    public function closeConnection(){
        mysqli_close($this->connection);
    }
    
}
