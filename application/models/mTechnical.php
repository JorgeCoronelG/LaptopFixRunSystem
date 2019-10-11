<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mTechnical extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function insertar($param){
        $campos = array(
            'idTech' => $param['id'],
            'nameTech' => $param['nombre'],
            'addTech' => $param['domicilio'],
            'phoneTech' => $param['telefono'],
            'email' => $param['correo'],
            'ifeTech' => $param['credencial'],
            'comAddTech' => $param['compDomicilio']
        );
        $this->db->insert('TECHNICAL', $campos);
        return TRUE;
    }
    
    public function getTechnical($id){
        $this->db->select('*');
        $this->db->from('TECHNICAL');
        $this->db->where('idTech', $id);
        $result = $this->db->get();
        return $result->row();
    }
    
    public function getTechnicalByEmail($email){
        $this->db->select('*');
        $this->db->from('TECHNICAL');
        $this->db->where('email', $email);
        $result = $this->db->get();
        return $result->row();
    }

}