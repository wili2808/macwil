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
        $this ->load->model('producto_model');
        $this ->load->model('carrito_model');
        $this->load->library('cart');
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
        $dato = array('producto' => $this->producto_model->get_producto_uniformes());
        
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('producto/uniformes_views',$dato);
        $this->load->view('partes/footer_views');
	}
    public function prendas()
	{
		$data = array('titulo' => 'Prendas en General');
        $dato = array('producto' => $this->producto_model->get_producto_prendas());
        
		$this->load->view('partes/head_views',$data);
        $this->load->view('partes/cabecera_views');
        $this->load->view('producto/prendas_views',$dato);
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
    
    function login()
        {
            $data = array('titulo' => 'Acceso');
            $this->load->view('partes/head_views',$data);
            $this->load->view('partes/cabecera_views');
            $this->load->view('login_views');
            $this->load->view('partes/footer_views');
        }
    
    public function registro()
        {
            $data = array('titulo' => 'Registro');
            $this->load->multiple_views(['partes/head_views','partes/cabecera_views','registro_views','partes/footer_views'],$data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */