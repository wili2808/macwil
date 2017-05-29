<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_controller extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
        $this->load->model('producto_model');
	}
    
	public function index()
	{
		$data = array('titulo' => 'Agregar Producto');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('agregar_producto_views');
        $this->load->view('partes/footer_views');
	}
    
    //Funcion que verifica si el usuario esta logueado ...
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
    
    //Funcion que llama a la vista del formulario para insertar productos ...
    public function form_insertar_p()
    {
        if($this->_veri_log())
        {
            $data = array('titulo' => 'Agregar Producto');
            $this->load->view('partes/head_views',$data);
            $this->load->view('partes/cabecera_views');
            $this->load->view('agregar_producto_views');
            $this->load->view('partes/footer_views');
        }
        else
        {
            redirect('login', 'refresh');
        }
    }
}

/* End of file uniformes_escolares.php */