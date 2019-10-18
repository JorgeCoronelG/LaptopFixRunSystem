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
        $this->loadView('Agregar Técnico', 'admin/technical/vInsert');
    }
    
    public function gestionarTecnicos(){
        $this->loadView('Gestionar Técnico', 'admin/technical/vManagment');
    }
    
    public function abonosTecnicos(){
        $this->loadView('Abonos Técnicos', 'admin/technical/vPayment');
    }
    
    public function gestionarServicioBase(){
        $this->loadView('Servicio base', 'admin/baseService/vManagment');
    }
    
    public function loadView($title, $file){
        $data['title'] = $title;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu');
        $this->load->view($file);
        $this->load->view('admin/layout/footer');
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}