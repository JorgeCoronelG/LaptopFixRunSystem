<?php

/**
 * Description of userDAO
 *
 * @author Jorge Coronel González
 */

require_once '../Model/userBEAN.php';
require_once '../Model/userDAO.php';
require_once '../Model/customerBEAN.php';
require_once '../Model/customerDAO.php';

$json = array();

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['number'])){
    $user = new UserBEAN();
    $user->setEmail($_POST['email']);
    $user->setPassword(md5($_POST['password']));
    $user->setStatus(1);
    $user->setIdTypeUser(2);//2 = Cliente

    $userDao = new UserDAO();

    if(!$userDao->existEmail($user->getEmail())){

        $user = $userDao->insert($user);

        if($user != FALSE){
            $customer = new CustomerBEAN();
            $customer->setEmail($user->getEmail());
            $customer->setNameCus($_POST['name']);
            $customer->setNumberCus($_POST['number']);

            $customerDao = new CustomerDAO();
            $customer = $customerDao->insert($customer);

            if($customer != FALSE){
                $json['code'] = 200;
                $json['customer']['id'] = $customer->getIdCus();
                $json['customer']['name'] = $customer->getNameCus();
                $json['customer']['number'] = $customer->getNumberCus();
                $json['customer']['email'] = $user->getEmail();
                $json['customer']['password'] = $user->getPassword();
                $json['customer']['status'] = $user->getStatus();
                $json['customer']['typeUser'] = $user->getIdTypeUser();
                
                /*$sendEmail = new sendEmail($customer->getEmail(), "Correo de verificación");
                $sendEmail->sendEmail();*/
            }else{
                $json['code'] = 404;
                $json['message'] = "Error. Vuelva a intentar más tarde";
            }
        }else{
            $json['code'] = 404;
            $json['message'] = "Error. Vuelva a intentar más tarde";
        }
    }else{
        $json['code'] = 404;
        $json['message'] = "Correo ya registrado";
    }
}else{
    $json['code'] = 404;
    $json['message'] = "Error";
}

echo json_encode($json);

//Clase para enviar un email con un link para activar su cuenta
/*class sendEmail{
    
    private $to;
    private $subject;
    private $message;
    private $header;
    private $url;
    
    function __construct($to, $subject) {
        $this->to = $to;
        $this->subject = $subject;
        $this->url = 'https://www.impactosdigitales.com/LaptopFixRun/Customer/activeAccount.php?email='.$this->to.'';
    }
    
    private function getMessage(){
        $this->message = "<html><body>";
        $this->message .= "<p>";
        $this->message .= "Entra al siguiente link para activar tu cuenta: ";
        $this->message .= "<a target='_blank' href='$this->url'>Click Aquí</a>";
        $this->message .= "</p>";
        $this->message .= "<p style='padding-left: 30px;'><img src='https://impactosdigitales.com/images/img_firmas/dan_firma.jpg' width='800' border='0' /></p>";
        $this->message .= "<p style='text-align: justify; padding-left: 30px;'><span style='font-size: 14pt; font-family: arial, helvetica, sans-serif;'><strong>Ing.</strong> Raso R&iacute;os Dan Jonathan<br /></span></p>";
        $this->message .= "<p style='text-align: justify; padding-left: 30px;'><span style='font-size: 12pt; font-family: arial, helvetica, sans-serif;'><strong>Director</strong></span></p>";
        $this->message .= "<hr />";
        $this->message .= "<p style='text-align: justify; padding-left: 30px;'><span style='font-size: 12pt; color: #000000; font-family: arial, helvetica, sans-serif;'><strong>Tel&eacute;fono:</strong> (442) 486 5389<br /></span></p>";
        $this->message .= "<p style='text-align: justify; padding-left: 30px;'><span style='font-size: 12pt; color: #000000; font-family: arial, helvetica, sans-serif;'><strong>Correo: </strong>dan@impactosdigitales.com </span></p>";
        $this->message .= "<p style='text-align: justify; padding-left: 30px;'><span style='font-size: 12pt; color: #000000; font-family: arial, helvetica, sans-serif;'><strong>Ubicaci&oacute;n:</strong> Ezequiel Montes Sur 77, Centro Quer&eacute;taro, Qro. </span></p>";
        $this->message .= "</body></html>";
        return $this->message;
    }

    private function getHeader(){
        $this->header = 'MIME-Version: 1.0' . "\r\n";
        $this->header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $this->header .= "From: Impactos Digitales <aplicaciones@impactosdigitales.com>" . "\r\n" . "CC: ventas@impactosdigitales.com";
        return $this->header;
    }
    
    public function sendEmail(){
        if(mail($this->to, $this->subject, $this->getMessage(), $this->getHeader())){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
}*/

?>