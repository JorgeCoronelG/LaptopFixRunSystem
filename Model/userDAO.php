<?php

/**
 * Description of userDAO
 *
 * @author osval
 */
require_once 'connection.php';
require_once 'userBEAN.php';
class UserDAO extends Connection{
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($user){
        $query = "INSERT INTO USER VALUES("
                . "'".$user->getEmail()."',"
                . "'".$user->getPassword()."',"
                . "".$user->getStatus().","
                . "".$user->getidTypeUser().")";
        
        if(mysqli_query($this->connection, $query) === TRUE){
            $this->closeConnection();
            return $user;
        }else{
            $this->closeConnection();
            return FALSE;
        }
    }
    
    public function login($user){
        $query = "SELECT * FROM USER WHERE email = '".$user->getEmail()."' AND password = '".$user->getPassword()."'";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) == 0){
            return NULL;
        }else{
            $dataUser = mysqli_fetch_array($result);
            $userBean = new UserBEAN();
            $userBean->setEmail($dataUser['email']);
            $userBean->setPassword($dataUser['password']);
            $userBean->setStatus($dataUser['status']);
            $userBean->setIdTypeUser($dataUser['idTypeUser']);
            return $userBean;
        }
    }
    
    public function existEmail($email){
        $query = "SELECT * FROM USER WHERE email = '".$email."'";
        $result = mysqli_query($this->connection, $query);
        if(mysqli_num_rows($result) > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
