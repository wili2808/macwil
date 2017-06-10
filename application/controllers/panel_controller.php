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
        
        private function _veri_adm()
        {
            if ($this->session->userdata('logged_in') and ($this->session->userdata('tipo_usuario') == '1'))
            {
                return TRUE;
            } 
            else
            {
                return FALSE;
            }
        }
    /**
    * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
    * Si existe sesión activa muestra la vista del panel general.
    * Si no hay sesión, redirige a la ruta panel
    * @access  public
    */
//    function index()
//    {
//        if($this->session->userdata('logged_in') and ($this->session->userdata('tipo_usuario') == '1'))
//        {
//            $session_data = $this->session->userdata('logged_in');
//            $data['usuario'] = $session_data['usuario'];
//            $data['titulo'] = 'Perfil de '.$session_data['usuario'];
//            $this->load->view('partes/head_views',$data);
//            $this->load->view('partes/cabecera_views');
//            $this->load->view('panel_views',$data);
//            $this->load->view('usuario/datos_perfil_views');
//            $this->load->view('partes/footer_views');
//        }
//        else
//        {
//            $data = array('titulo' => 'Acceso');
//            $this->load->view('partes/head_views',$data);
//            $this->load->view('partes/cabecera_views');
//            $this->load->view('aviso_administrador_views');
//            $this->load->view('login_views');
//            $this->load->view('partes/footer_views');
//        }
//    }
    
    function index()
        {
            if($this->_veri_adm())
            {

                $id = $this->session->userdata('id');
                
                $datos_perfil = $this->usuario_model->update_socios($id);
                if ($datos_perfil != FALSE)
                {
                    foreach ($datos_perfil->result() as $row) {
                        $nombre= $row->nombre;
                        $apellido = $row->apellido;
                        $usuario = $row->usuario;
                        $pass = $row->pass;
                        $tel = $row->tel;
                        $email = $row->email;
                        $tipo_usuario = $row->tipo_usuario;
                    }
                    $data = array('nombre' =>$nombre,
                                  'id'=>$id,
                                  'apellido'=>$apellido,
                                  'email' =>$email,
                                  'tel'=>$tel,
                                  'usuario'=>$usuario,
                                  'tipo_usuario'=>$tipo_usuario,
                                  'pass'=>base64_encode($pass)
                            );
                }else{
                    return FALSE;
                }
                $session_data = $this->session->userdata('logged_in');
                $tit = array ('titulo' => 'Panel Administrador');
                $dato['usuario'] = $session_data['usuario'];
                
                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$dato);
                $this->load->view('usuario/datos_perfil_views',$data);
                $this->load->view('partes/footer_views');
                
            }
            else
            {
                $data = array('titulo' => 'Acceso');
                $this->load->view('partes/head_views',$data);
                $this->load->view('partes/cabecera_views');
                $this->load->view('aviso_administrador_views');
                $this->load->view('login_views');
                $this->load->view('partes/footer_views');
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