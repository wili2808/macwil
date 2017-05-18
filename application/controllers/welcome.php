<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
    
	public function index()
	{
        $data = array('titulo' => 'Bienvenidos');
		$this->load->view('front/partes/head_views',$data);
        $this->load->view('front/partes/cabecera_views');
        $this->load->view('front/index_content_views');
        $this->load->view('front/partes/footer_views');
	}
    
    public function uniformes()
	{
        $data = array('titulo' => 'Uniformes Escolares');
		$this->load->view('front/partes/head_views',$data);
        $this->load->view('front/partes/cabecera_views');
        $this->load->view('front/partes/footer_views');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */