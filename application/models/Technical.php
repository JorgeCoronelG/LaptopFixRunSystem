<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technical extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function insert($param){
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
    
    public function update($param){
        $campos = array(
            'nameTech' => $param['nombre'],
            'addTech' => $param['domicilio'],
            'phoneTech' => $param['telefono']
        );
        $this->db->where('idTech', $param['id']);
        $this->db->update('TECHNICAL', $campos);
        return TRUE;
    }
    
    public function updateINE($param){
        $campos = array(
            'ifeTech' => $param['credencial']
        );
        $this->db->where('idTech', $param['id']);
        $this->db->update('TECHNICAL', $campos);
        return TRUE;
    }
    
    public function updateCompAdd($param){
        $campos = array(
            'comAddTech' => $param['compDomicilio']
        );
        $this->db->where('idTech', $param['id']);
        $this->db->update('TECHNICAL', $campos);
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
    
    public function getAll(){
        $this->db->select('t.*, p.payment, c.commission');
        $this->db->from('TECHNICAL t');
        $this->db->join('PAYMENT p', 't.idTech = p.idTech');
        $this->db->join('COMMISSION c', 't.idTech = c.idTech');
        $this->db->join('USER u', 't.email = u.email');
        $this->db->where('status', 1);
        $this->db->order_by('nameTech', 'ASC');
        $result = $this->db->get();
        return $result->result();
    }
    
}