<?php 
    
    class Usuario_controller extends CI_Controller
    {
        //creamos el constructor
        public function __construct()
        {
            parent::__construct();
            $this ->load->model('usuario_model');	
        }
        
        //funcion que se ejecuta por defecto ----> Carga las vistas del Perfil de usuario...
        function index($id)
		{
			//obtengo el usuario mediante su id
			$user = $this->usuario_model->get_by_id($id);
			//asigno a $data las variables que paso a la vista
            $data['usuario'] = $user->nombre;
			$data['titulo'] = 'Perfil de '.$user->nombre;
			//Cargo las vistas
			$this->load->multiple_views(['partes/head_views','partes/cabecera_views','perfil_usuario_views','partes/footer_views'],$data);
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
				$usuario = $this->input->post('usuario');
                //recupero el usuario mediante el nombre de usuario
                $user = $this->usuario_model->get_by_username($usuario);
				$data_user = array('usuario'=> $usuario, 'logued_in' => TRUE);
				//asigno dos datos a la sesión --> (username y logued_in)
				$this->session->set_userdata($data_user);
                //redirigimos a la página de perfil
				redirect('perfil/'.$id);
			}
        }
        
        function _valid_login($password)
		{ 
			$username = $this->input->post('usuario');
            //Verifico si el usuario y la contraseñas pasados existen en la base de datos
			return $this->usuario_model->validar_usuario($username,$password);
		}
		
		function valid_login_ajax()
        {
			//verificamos si la petición es via ajax
			if($this->input->is_ajax_request())
            {
				if($this->input->post('usuario')!=='')
                {
					$username = $this->input->post('usuario');
					$this->login_model->validar_usuario_ajax($username);	
				}
            }
            else
            {
				redirect('home');
			}
		}
        
        public function registro()
        {
            $data = array('titulo' => 'Registro');
            $this->load->multiple_views(['partes/head_views','partes/cabecera_views','registro_views','partes/footer_views'],$data);
        }
		
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
				$data_user = $array = array('usuario'=> $usuario, 'logued_in' => TRUE, 'name'=>$data['nombre']);
				//asigno los datos a la sesion
				$this->session->set_userdata($data_user); 
				//Redirecciono a la pagina de perfil
				redirect('perfil/'.$user);
			}	
		}
        
        function logout()
        {
            //destruyo la variable de sesion
			$this->session->sess_destroy();
            //direcciono a la página principal
			redirect(base_url());		
		}
	}