<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cTechnical extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('mTechnical');
        $this->load->model('mUser');
    }

    public function agregar(){
        $param = array();
        $param['correo'] = $this->input->post('txtEmail');
        $param['clave'] = md5($this->input->post('txtPassword'));
        $param['estatus'] = 1;//Está activo
        $param['tipoUsuario'] = 3;//3 -> Técico
        $this->mUser->insert($param);

        $param['id'] = $this->input->post('id');
        $param['nombre'] = $this->input->post('txtName');
        $param['domicilio'] = $this->input->post('txtAddress');
        $param['telefono'] = $this->input->post('txtPhone');

        $this->configurarRuta();

        if($this->upload->do_upload('credential')){
            $file_info = $this->upload->data();
            $param['credencial'] = $file_info['file_name'];
        }else{
            echo FALSE;
            return;
        }

        if($this->upload->do_upload('address')){
            $file_info = $this->upload->data();
            $param['compDomicilio'] = $file_info['file_name'];
        }else{
            echo FALSE;
            return;
        }
        $this->mTechnical->insertar($param);
        echo TRUE;
    }

    public function configurarRuta(){
        //Configuración para subir archivos
        $config['upload_path'] = "./uploads/Documentos/";
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '20048';
        $this->load->library('upload',$config);
    }

}