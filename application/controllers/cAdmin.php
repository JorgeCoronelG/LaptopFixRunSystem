<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cAdmin extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('user')){
            redirect(base_url());
        }
    }

    public function index(){
        $data['title'] = 'Admin | Inicio';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/footer');
    }

    public function agregarTecnico(){
        $data['title'] = 'Agregar Técnico';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/technical/vInsert');
        $this->load->view('admin/layout/footer');
    }
    
    public function gestionarTecnicos(){
        $data['title'] = 'Gestionar técnicos';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/technical/vManagment');
        $this->load->view('admin/layout/footer');
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}