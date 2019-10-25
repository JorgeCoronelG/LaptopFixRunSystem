<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('user')){
            redirect(base_url());
        }
    }

    public function index(){
        $data['title'] = 'Admin | Inicio';
        $this->load->view('admin/layout/Header', $data);
        $this->load->view('admin/layout/Menu');
        $this->load->view('admin/layout/Footer');
    }

    public function agregarTecnico(){
        $this->loadView('Agregar Técnico', 'admin/technical/Insert');
    }
    
    public function gestionarTecnicos(){
        $this->loadView('Gestionar Técnico', 'admin/technical/Managment');
    }
    
    public function abonosTecnicos(){
        $this->loadView('Abonos Técnicos', 'admin/technical/Payment');
    }
    
    public function gestionarServicioBase(){
        $this->loadView('Servicio base', 'admin/baseService/Managment');
    }
    
    public function gestionarComision(){
        $this->loadView('Comisión técnicos', 'admin/technical/Commission');
    }
    
    public function loadView($title, $file){
        $data['title'] = $title;
        $this->load->view('admin/layout/Header', $data);
        $this->load->view('admin/layout/Menu');
        $this->load->view($file);
        $this->load->view('admin/layout/Footer');
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}