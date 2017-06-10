<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_controller extends CI_Controller {
    
    public function __construct(){
		parent::__construct();
        $this ->load->model('consulta_model');
	}
    
    private function _veri_log()
    {
    	if ($this->session->userdata('logged_in')) {
    		return TRUE;
    	} else {
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
    
    
	public function index()
	{
        $tit = array('titulo' => 'Consulta');
        $this->load->view('partes/head_views',$tit);
        $this->load->view('partes/cabecera_views');
        $this->load->view('consulta/consulta_views');
        $this->load->view('partes/footer_views');
    }
    
    function insert_consulta()
    {
        //Validación del formulario
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric');
        $this->form_validation->set_rules('motivo', 'Motivo', 'required');
        $this->form_validation->set_rules('mensaje', 'Mensaje', 'required');
        $this->form_validation->set_rules('filename', 'Imagen', 'callback__image_upload');
        

        //Mensaje del form_validation
        $this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');
        $this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>'); 
        
        
        if (!$this->form_validation->run())
        {
                $tit = array('titulo' => 'Consulta');
                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('consulta/consulta_views');
                $this->load->view('partes/footer_views');
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
                    'nombre'=>$this->input->post('nombre',true),
                    'apellido'=>$this->input->post('apellido',true),
                    'email'=>$this->input->post('email',true),
                    'telefono'=>$this->input->post('telefono',true),
                    'motivo'=>$this->input->post('motivo',true),
                    'mensaje'=>$this->input->post('mensaje',true),
                    'fecha' => date('Y-m-d'),
                    'imagen'=>$url
                );
                $datos_consulta = $this->consulta_model->create_consulta($data);
                
                redirect('consulta_enviada','refresh');
                return TRUE;
            }
            else
            {
                //Mensaje de error si no existe imagen correcta
                $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';//$this->upload->display_errors();
                $this->form_validation->set_message('_image_upload',$imageerrors );

                return false;
            }
        }else
        {
            $data = array(
                    'nombre'=>$this->input->post('nombre',true),
                    'apellido'=>$this->input->post('apellido',true),
                    'email'=>$this->input->post('email',true),
                    'telefono'=>$this->input->post('telefono',true),
                    'motivo'=>$this->input->post('motivo',true),
                    'mensaje'=>$this->input->post('mensaje',true),
                    'fecha' => date('Y-m-d'),
                );
                $datos_consulta = $this->consulta_model->create_consulta($data);
                
                redirect('consulta_enviada','refresh');
        }
    }
    
    public function consulta_enviada()
	{
        $tit = array('titulo' => 'Consulta');
        $this->load->view('partes/head_views',$tit);
        $this->load->view('partes/cabecera_views');
        $this->load->view('consulta/consulta_enviada_views');
        $this->load->view('partes/footer_views');
    }
    
    public function all_consultas()
	{
		if($this->_veri_adm())
        {
        	$session_data = $this->session->userdata('logged_in');
            $tit = array ('titulo' => 'Panel Administrador');
            $data['usuario'] = $session_data['usuario'];
			$dato = array(
			        'consultas' => $this->consulta_model->get_consultas()
                    );
			$this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('panel_views',$data);
            $this->load->view('consulta/all_consultas_views',$dato);
            $this->load->view('partes/footer_views');
		}else{
            $data = array('titulo' => 'Acceso');
            $this->load->view('partes/head_views',$data);
            $this->load->view('partes/cabecera_views');
            $this->load->view('aviso_administrador_views');
            $this->load->view('login_views');
            $this->load->view('partes/footer_views');
        }
	}
    
    function ver_consulta()
    {
        $id = $this->uri->segment(2);
        
        $datos_consulta = $this->consulta_model->get_consulta_id($id);
        if ($datos_consulta != FALSE)
        {
            foreach ($datos_consulta->result() as $row) {
                $nombre= $row->nombre;
                $apellido = $row->apellido;
                $email = $row->email;
                $telefono = $row->telefono;
                $motivo = $row->motivo;
                $imagen = $row->imagen;
                $mensaje = $row->mensaje;
                $fecha = $row->fecha;
            }
            $data = array('nombre' =>$nombre,
                          'id'=>$id,
                          'apellido'=>$apellido,
                          'email' =>$email,
                          'telefono'=>$telefono,
                          'motivo'=>$motivo,
                          'imagen'=>$imagen,
                          'mensaje'=>$mensaje,
                          'fecha'=>$fecha
                    );
        }else{
            return FALSE;
        }
        if($this->_veri_adm())
        {
            $session_data = $this->session->userdata('logged_in');
            $tit = array ('titulo' => 'Panel Administrador');
            $dato['usuario'] = $session_data['usuario'];
            
            $this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('panel_views',$dato);
            $this->load->view('consulta/ver_consulta_views',$data);
            $this->load->view('partes/footer_views');
        }
        else{
            $data = array('titulo' => 'Acceso');
            $this->load->view('partes/head_views',$data);
            $this->load->view('partes/cabecera_views');
            $this->load->view('aviso_administrador_views');
            $this->load->view('login_views');
            $this->load->view('partes/footer_views');
        }
    }
    
    function remove_consulta(){
        $id = $this->uri->segment(2);
        $data = array(
            'eliminado'=>'SI'
            );
        $this->consulta_model->estado_consulta($id, $data);
        redirect('all_consultas', 'refresh');
    }
    
    
}