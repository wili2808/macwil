<?php 
    class Usuario_controller extends CI_Controller
    {
        //Constructor del controlador
        public function __construct()
        {
            parent::__construct();
            $this ->load->model('usuario_model');	
        }
        
        //funcion que se ejecuta por defecto ----> Carga las vistas correspondientes al formulario de LOGIN...
        function index()
		{
            $data = array('titulo' => 'Acceso');
            $this->load->view('partes/head_views',$data);
            $this->load->view('partes/cabecera_views');
            $this->load->view('login_views');
            $this->load->view('partes/footer_views');
        }
        
        //Funcion que verifica si existe usuario logeado...
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
    	
        //Función que verifica los datos cargados en el Login...
        function verifico_login()
        {
            // reglas de validación
			$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback__valid_login');
			//mensaje si falla alguna validacion
			$this->form_validation->set_message('required', 'el campo %s es requerido');
			$this->form_validation->set_message('_valid_login', 'El usuario o contraseña son incorrectos');
			//forma en que se muestra fallo de validacion
            $this -> form_validation -> set_error_delimiters('<div class="alert alert-danger">', '</div>');
            //si falla la validadcion carga el login con titulo de Error...
			if ($this->form_validation->run() == FALSE)
			{
				$data = array('titulo' => 'Error de Logeo');
                $this->load->view('partes/head_views',$data);
                $this->load->view('partes/cabecera_views');
                $this->load->view('login_views');
                $this->load->view('partes/footer_views');
			}
			else
            {
                //redirigimos a la página de perfil
				redirect('panel','refresh');
            }
        }
        
        //Funcion que virifica si los datos ingresados en LOGIN coinsiden en la Base de Datos...
        function _valid_login($password)
		{
			$username = $this->input->post('usuario');
            //Verifico si el usuario y la contraseñas pasados existen en la base de datos
            $result = $this->usuario_model->validar_usuario($username,$password);
            
            if($result)
            {
               $sess_array = array();
               foreach($result as $row)
               {
                    $sess_array = array(
                        'id' => $row->id,
                        'usuario' => $row->usuario,
                        'nombre' => $row->nombre
                    );
                    $this->session->set_userdata('logged_in', $sess_array);
                }
                
                $data=["login_ajax"=> TRUE,"nombre"=>$row->nombre,"usuario"=> $row->usuario];
                $this->session->set_userdata($data);
            }
            else
            {
                $this->form_validation->set_message('_valid_login', '<div class="alert alert-danger">usuario o contraseña invalido</div>');
                return false;
            }
		}
		
        //Funcion que carga las vistas correspondientes al formulario de REGISTRO...
        public function registro()
        {
            $data = array('titulo' => 'Registro');
            $this->load->multiple_views(['partes/head_views','partes/cabecera_views','registro_views','partes/footer_views'],$data);
        }
        
        //Función que verifica los datos cargados en el formulario de REGISTRO...
        public function verifico_registro()
        {
			//Genero las reglas de validacion
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|is_unique[usuarios.usuario]');
            $this->form_validation->set_rules('password', 'Contraseña','required|xss_clean');
			$this->form_validation->set_rules('re_password', 'Repetir contraseña','required|matches[password]');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');
			$this->form_validation->set_message('matches','<div class="alert alert-danger">Los contraseña ingresada no coincide</div>');
			$pass = $this->input->post('re_password',true);
			
			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				//Muestra la página de registro con el título de error
				$data = array('titulo' => 'Error de Registro');
                $this->load->multiple_views(['partes/head_views','partes/cabecera_views','registro_views','partes/footer_views'],$data);
			}
			//Pasa la validacion
			else
			{
                //Preparo los datos para guardar en la base...
                //Los datos corresponden a los nombres de mi campos de la base de datos
                $data = array(
				'nombre'=>$this->input->post('nombre',true),
				'apellido'=>$this->input->post('apellido',true),
				'usuario'=>$this->input->post('usuario',true),
				'pass'=>($pass),
                'tel'=>$this->input->post('telefono',true),
                'email'=>$this->input->post('email',true)
                );
				//Envio array al metodo insert para registro de datos
				$user = $this->usuario_model->add_user($data);
				$data_user = array('usuario'=> $usuario, 'logued_in' => TRUE, 'name'=>$data['nombre']);
				//asigno los datos a la sesion
				$this->session->set_userdata($data_user); 
				//Redirecciono a la pagina de perfil
				redirect('perfil/'.$user);
			}	
		}
        
        public function all()
        {
            if($this->_veri_log())
            {
                $session_data = $this->session->userdata('logged_in');
                $dat['usuario'] = $session_data['usuario'];
                $tit = array('titulo' => 'Panel Administrador');
                $data = array(
                    'usuarios' => $this->usuario_model->get_socios()
                );
                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$dat);
                $this->load->view('all_usuarios_views', array_merge($dat, $data));
                $this->load->view('partes/footer_views');
            }
            else
            {
               redirect('login', 'refresh');
            }
        }
        
        function edit()
        {
            $id = $this->uri->segment(2);
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
                    $pass = $row->pass;
                }
                $data = array('user' =>$datos_usuario,
                              'id'=>$id,
                              'nombre'=>$nombre,
                              'apellido'=>$apellido,
                              'telefono'=>$telefono,
                              'email'=>$email,
                              'usuario'=>$usuario,
                              'pass'=>$pass
                );
            }
            else
            {
                return FALSE;
            }	
            if($this->_veri_log())
            {
                $session_data = $this->session->userdata('logged_in');
                $dat['usuario'] = $session_data['usuario'];  
                $this->load->view('partes/head_views',$dat);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views');
                $this->load->view('edit_usuario_views',$data);
                $this->load->view('partes/footer_views');
            }
        }
        
        function editar_socio()
        {
            //Validación del formulario
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('telefono', 'Dias Prestados', 'required|numeric');
            $this->form_validation->set_rules('email', 'Usuario', 'required');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');

            //Mensaje del form_validation
            $this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');    
            $this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');         

            $id = $this->uri->segment(2);
            $pass = $this->input->post('pass',true);
            $data = array(
                'id'=>$id,
                'nombre'=>$this->input->post('nombre',true),
                'apellido'=>$this->input->post('apellido',true),
                'tel'=>$this->input->post('telefono',true),
                'email'=>$this->input->post('email',true),
                'usuario'=>$this->input->post('usuario',true)
                );

            if ($this->form_validation->run() == FALSE)
            {
                //Si hay error en algun campo del formulario la clave permanece legible
                $data['pass'] = $pass;
                $this->load->view('partes/head_views',$dat);
                $this->load->view('partes/cabecera_views');
                $this->load->view('edit_usuario_views',$data);
                $this->load->view('partes/footer_views');
            }
            else
            {
                //Si la validación del formulario es correcta la clave la encripta
                $data['pass']= $pass;

                $this->usuario_model->set_socio($id, $data);
                redirect('lista_usuarios', 'refresh');
            }
        }
        
        function valid_login_ajax()
        {
        //verificamos si la petición es via ajax
            if($this->input->is_ajax_request()){

                if($this->input->post('usuario')!==''){
                    $usuario = $this->input->post('usuario');
                    $pass = $this->input->post('pass'); 
                    $result = $this->usuario_model->valid_user_ajax($usuario, $pass);  
                    if ($result) {
                        $data=[
                            "id"=> $result->id,
                            "nombre"=> $result->nombre,
                            "usuario"=> $result->usuario,
                            "login_ajax"=> TRUE
                        ];
                        $this->session->set_userdata($data);
                        
                        $sess_array = array(
                        'id' => $result->id,
                        'usuario' => $result->usuario);
                        $this->session->set_userdata('logged_in', $sess_array);
                        
                    } else {
                        echo 'error';
                    }
                }else{
                    echo 'error';
                }
            }
        } // fin del método valid_login_ajax
        
        //Cierra sesión de ajax
        function logout_ajax()
        {        
            $this->session->unset_userdata('login_ajax');
            session_destroy();
            redirect('salir');
        }
        
        function logout()
        {
            //destruyo la variable de sesion
			$this->session->sess_destroy();
            //direcciono a la página principal
			redirect(base_url());		
		}
	}