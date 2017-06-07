<?php 
//Se encarga de manejar la sesion de un socio, ni no estas logeado no podrás ingresar al panel
session_start();
/**
 * Panel_controller
 *
 * @package     back
 * @author      Lic. Romero, Carlos Alberto
*/ 
class Panel_controller extends CI_Controller {
 
    /**
    * Constructor del controller
    *
    * @access  public
    */
    function __construct()
    {
        parent::__construct();
    }
    
    /**
    * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
    * Si existe sesión activa muestra la vista del panel general.
    * Si no hay sesión, redirige a la ruta panel
    * @access  public
    */
    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['usuario'];
            $data['titulo'] = 'Perfil de '.$session_data['usuario'];
            $this->load->view('partes/head_views',$data);
            $this->load->view('partes/cabecera_views');
            $this->load->view('panel_views',$data);
            $this->load->view('datos_perfil_views');
            $this->load->view('partes/footer_views');
        }
        else
        {
            redirect('panel', 'refresh');
        }
    }
    /**
    * Función para cerrar la sesión activa.
    * Muestra la vista de login al cerrar sesión
    * @access  public
    */
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->load->view('partes/login/head_login_views.php');
        $this->load->view('back/login_views');
        $this->load->view('partes/login/footer_login_views.php');
    }
 
}
/* End of file panel_controller.php */
/* Location: ./application/controllers/back/panel_controller.php */