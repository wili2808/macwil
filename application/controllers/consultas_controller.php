<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_controller extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
	}
    
	public function index()
	{
		$data = array('titulo' => 'Consulta');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('consulta_views');
        $this->load->view('partes/footer_views');
	}
}