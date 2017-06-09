<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_controller extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
        $this ->load->model('usuario_model');
	}
    
    private function _veri_log()
    {
        if ($this->session->userdata('logged_in'))
        {
            return TRUE;
        } 
        else
        {
            return FALSE;
        }
    }
    
	public function index()
	{
        if($this->_veri_log()){
            
            $id = $this->session->userdata('id');
            $datos_usuario = $this->usuario_model->update_socios($id);
            
            if ($datos_usuario != FALSE)
            {
                foreach ($datos_usuario->result() as $row) 
                {
                    $nombre = $row->nombre;
                    $apellido = $row->apellido;
                    $telefono = $row->tel;
                    $usuario = $row->usuario;
                    $email = $row->email;
                }
                $data = array('user' =>$datos_usuario,
                              'id'=>$id,
                              'nombre'=>$nombre,
                              'apellido'=>$apellido,
                              'telefono'=>$telefono,
                              'email'=>$email,
                );
            }
            else
            {
                return FALSE;
            }
            
            $tit = array('titulo' => 'Consulta');
                
            $this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('consulta_2_views',$data);
            $this->load->view('partes/footer_views');
        }
        else
        {
            $tit = array('titulo' => 'Consulta');
            $this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('consulta_views');
            $this->load->view('partes/footer_views');
        }
        
	}
}