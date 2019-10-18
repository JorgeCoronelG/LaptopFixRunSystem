<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cTechnical extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('mTechnical');
        $this->load->model('mUser');
        $this->load->model('mPayment');
        $this->load->model('mCommission');
    }

    public function agregar(){
        $json = array();
        $param = array();
        $param['correo'] = $this->input->post('txtEmail');
        $param['clave'] = md5($this->input->post('txtPassword'));
        $param['estatus'] = 1;//Está activo
        $param['tipoUsuario'] = 3;//3 -> Técnico
        $this->mUser->insert($param);

        $param['id'] = $this->input->post('id');
        $param['nombre'] = $this->input->post('txtName');
        $param['domicilio'] = $this->input->post('txtAddress');
        $param['telefono'] = $this->input->post('txtPhone');

        $this->configurarRuta();

        if($this->upload->do_upload('credential')){
            $file_info_c = $this->upload->data();
            $param['credencial'] = $file_info_c['file_name'];
            
            if($this->upload->do_upload('address')){
                $file_info_a = $this->upload->data();
                $param['compDomicilio'] = $file_info_a['file_name'];
                //Insertar a la base de datos
                $this->mTechnical->insert($param);
                //Insertar en la tabla de abono
                $param['payment'] = 0;
                $this->mPayment->insert($param);
                //Insertar en la tabla de comisión - Por default es el 20%
                $param['comision'] = 20;
                $this->mCommission->insert($param);
                
                $json['code'] = 200;
            }else{
                $json['code'] = 404;
                $json['error'] = "Error al cargar los documentos";
                unlink('./uploads/documentos/'.$file_info_c['file_name']);
            }
        }else{
            $json['code'] = 404;
            $json['error'] = "Error al cargar los documentos";
        }
        
        echo json_encode($json);
    }
    
    public function actualizar(){
        $param = array();
        $param['id'] = $this->input->post('idTech');
        $param['nombre'] = $this->input->post('txtName');
        $param['domicilio'] = $this->input->post('txtAddress');
        $param['telefono'] = $this->input->post('txtPhone');
        $this->mTechnical->update($param);
        echo TRUE;
    }
    
    public function actualizarINE(){
        $json = array();
        $param = array();
        $param['id'] = $this->input->post('idTechINE');
        $tecnico = $this->mTechnical->getTechnical($param['id']);
        unlink('./uploads/documentos/'.$tecnico->ifeTech);
        $this->configurarRuta();
        if($this->upload->do_upload('credential')){
            $file_info_c = $this->upload->data();
            $param['credencial'] = $file_info_c['file_name'];
            $this->mTechnical->updateINE($param);
            $json['code'] = 200;
        }else{
            $json['code'] = 404;
            $json['error'] = "Error al cargar el documento";
        }
        echo json_encode($json);
    }

    public function actualizarCompDom(){
        $json = array();
        $param = array();
        $param['id'] = $this->input->post('idTechAdd');
        $tecnico = $this->mTechnical->getTechnical($param['id']);
        unlink('./uploads/documentos/'.$tecnico->comAddTech);
        $this->configurarRuta();
        if($this->upload->do_upload('address')){
            $file_info_c = $this->upload->data();
            $param['compDomicilio'] = $file_info_c['file_name'];
            $this->mTechnical->updateCompAdd($param);
            $json['code'] = 200;
        }else{
            $json['code'] = 404;
            $json['error'] = "Error al cargar el documento";
        }
        echo json_encode($json);
    }
    
    public function obtenerTecnicos(){
        echo json_encode($this->mTechnical->getAll());
    }

    public function configurarRuta(){
        //Configuración para subir archivos
        $config['upload_path'] = "./uploads/documentos/";
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '20048';
        $this->load->library('upload',$config);
    }

}