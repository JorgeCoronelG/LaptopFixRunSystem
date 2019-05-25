<?php

/**
 * Description of customerDAO
 *
 * @author osval
 */
require_once 'connection.php';
require_once 'customerBEAN.php';
class CustomerDAO extends Connection {
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($customer){
        $query = "INSERT INTO CUSTOMER VALUES (null,"
                . "'". utf8_decode($customer->getNameCus())."',"
                . "'". $customer->getNumberCus()."',"
                . "'". $customer->getEmail()."')";
        
        if(mysqli_query($this->connection, $query) === TRUE){
            $customer->setIdCus(mysqli_insert_id($this->connection));
            $this->closeConnection();
            return $customer;
        }else{
            $this->closeConnection();
            return FALSE;
        }
    }
    
    public function getCustomer($id){
        $query = "SELECT * FROM CUSTOMER WHERE idCus = $id";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            return NULL;
        }else{
            $dataCustomer = mysqli_fetch_array($result);
            $customerBean = new CustomerBEAN();
            $customerBean->setIdCus($dataCustomer['idCus']);
            $customerBean->setNameCus($dataCustomer['name']);
            $customerBean->setNumberCus($dataCustomer['number']);
            $customerBean->setEmail($dataCustomer['email']);
            return $customerBean;
        }
    }
    
    public function getCustomerByEmail($email){
        $query = "SELECT * FROM CUSTOMER WHERE email = '".$email."'";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            return NULL;
        }else{
            $dataCustomer = mysqli_fetch_array($result);
            $customerBean = new CustomerBEAN();
            $customerBean->setIdCus($dataCustomer['idCus']);
            $customerBean->setNameCus($dataCustomer['nameCus']);
            $customerBean->setNumberCus($dataCustomer['numberCus']);
            $customerBean->setEmail($dataCustomer['email']);
            return $customerBean;
        }
    }
    
}