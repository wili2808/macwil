<?php 
	
	class Verifico_login_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('login_model');	
		}
		
		function index()
		{   // reglas de validación
			$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback__valid_login');
			
			$this->form_validation->set_message('required', 'el campo %s es requerido');
			$this->form_validation->set_message('_valid_login', 'El usuario o contraseña son incorrectos');
			
			$this -> form_validation -> set_error_delimiters('<ul><li>', '</li></ul>');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data = array('titulo' => 'Error de Logeo');
                $this->load->view('front/partes/head_views',$data);
                $this->load->view('front/partes/cabecera_views');
                $this->load->view('front/login_views');
                $this->load->view('front/partes/footer_views');
			}
			else{
				$username = $this->input->post('usuario');
				$data_user = $array = array('usuario'=> $username, 'logued_in' => TRUE);
				
				// asignamos dos datos a la sesión --> (username y logued_in)									 
				$this->session->set_userdata($data_user); 
				
				$data['title'] = 'usuario'; 
				$data['usuario'] = $username;  // = $this->session->userdata('user');
				
				/* $this->load->view('admin/header_admin',$data);
					$this->load->view('admin/admin');
				$this->load->view('front/footer'); */
				redirect(welcome);
				
				
			}
		}
		
		function _valid_login($password)
		{ 
			$username = $this->input->post('usuario');
			return $this->login_model->valid_user($username,$password);
		}
		
		function valid_login_ajax(){
			//verificamos si la petición es via ajax
			if($this->input->is_ajax_request()){
				
				if($this->input->post('usuario')!==''){
					$username = $this->input->post('usuario');
					$this->login_model->valid_user_ajax($username);	
				}
				}else{
				redirect('welcome/login_exitoso');
			}
			
		} // fin del método valid_login_ajax
		
		function logout(){
			
			$this->session->sess_destroy(); 
			redirect('login_controller');		
		}
		
	}