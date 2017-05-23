<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    //creamos el constructor
	public function __construct(){
		parent::__construct();
	}
    
    //Funcion que se ejecuta por defecto ---> index
	public function index()
	{
        $data = array('titulo' => 'Bienvenidos');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('home_content_views');
        $this->load->view('partes/footer_views');
	}
    
    //Funciones de carga de vistas de productos y servicios...
    public function uniformes()
	{
        $data = array('titulo' => 'Uniformes Escolares');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('partes/footer_views');
	}
    public function prendas()
	{
		$data = array('titulo' => 'Prendas en General');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('partes/footer_views');
	}
    public function serigrafia()
	{
		$data = array('titulo' => 'Serigrafia');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('partes/footer_views');
	}
    public function bordados()
	{
		$data = array('titulo' => 'Bordados');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('partes/footer_views');
	}
    public function sublimaciones()
	{
		$data = array('titulo' => 'Sublimacion');
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('partes/footer_views');
	}
    //Fin de funciones de carga de vistas de productos y servicios...
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */