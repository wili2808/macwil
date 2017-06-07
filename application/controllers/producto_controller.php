<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_controller extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
        $this->load->model('producto_model');
	}
    
    //Funcion que verifica si el usuario esta logueado ...
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
    
    //Funcion que llama a la vista del formulario para insertar productos ...
	public function index()
    {
        if($this->_veri_log())
        {
            $session_data = $this->session->userdata('logged_in');
            $dat['usuario'] = $session_data['usuario'];
            $tit = array('titulo' => 'Panel Administrador');
            $this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('panel_views',$dat);
            $this->load->view('agregar_producto_views');
            $this->load->view('partes/footer_views');
		}else{
			redirect('ingreso', 'refresh');
		}
    }
    
    function insert_producto()
    {
		//Validación del formulario
		$this->form_validation->set_rules('nombre_p', 'Nombre', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
		$this->form_validation->set_rules('stock_minimo', 'Stock_minimo', 'required|numeric');
		$this->form_validation->set_rules('talle', 'Talle', 'required|numeric');
		$this->form_validation->set_rules('genero', 'Genero', 'required');
        $this->form_validation->set_rules('tipo_producto', 'Tipo_producto', 'required');
		$this->form_validation->set_rules('filename', 'Imagen', 'required|callback__image_upload');
		
		//Mensaje del form_validation
		$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');
		$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>'); 
		
		if (!$this->form_validation->run())
		{
			if($this->_veri_log())
        	{
	        	$session_data = $this->session->userdata('logged_in');
                $dat['usuario'] = $session_data['usuario'];
                $tit = array('titulo' => 'asdasdasd');
                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$dat);
                $this->load->view('agregar_producto_views');
                $this->load->view('partes/footer_views');
			}else{
				redirect('login', 'refresh');
			}
		}
		else
		{
			$this->_image_upload();			
		}
	}
    
    function _image_upload()
	{
        $this->load->library('upload');
            
            //Comprueba si hay un archivo cargado
            if (!empty($_FILES['filename']['name']))
            {
                // Especifica la configuración para el archivo
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                
                $config['max_size'] = '2048';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';       
                
                // Inicializa la configuración para el archivo 
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('filename'))
                {
                	// Mueve archivo a la carpeta indicada en la variable $data
                    $data = $this->upload->data();
                    // Path donde guarda el archivo..
                    $url ="uploads/".$_FILES['filename']['name'];
                    // Array de datos para insertar en libros 
                    $data = array(
						'nombre'=>$this->input->post('nombre_p',true),
						'precio'=>$this->input->post('precio',true),
						'stock'=>$this->input->post('stock',true),
						'stock_minimo'=>$this->input->post('stock_minimo',true),
						'imagen'=>$url,
						'talle'=>$this->input->post('talle',true),
						'genero'=>$this->input->post('genero',true),
                        'tipo_producto'=>$this->input->post('tipo_producto',true),
					);
					$datos_libros = $this->producto_model->create_prodcuto($data);
					redirect('home', 'refresh');
					return TRUE;
                }
                else
                {
                	//Mensaje de error si no existe imagen correcta
                    $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';//$this->upload->display_errors();
					$this->form_validation->set_message('_image_upload',$imageerrors );
				    
					return false;
                }
            }
            else
            {
            	redirect('registro_producto', 'refresh');
            }
	
	}
}

/* End of file uniformes_escolares.php */