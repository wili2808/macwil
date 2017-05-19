<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
	}
    
	public function index()
	{
		$data = array('titulo' => 'Acceso');
		$this->load->view('front/partes/head_views',$data);
        $this->load->view('front/partes/cabecera_views');
        $this->load->view('front/login_views');
        $this->load->view('front/partes/footer_views');
	}
}