<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Producto_controller extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('producto_model');
    }
    /**
    * Función que verifica si el usuario esta logueado
    * @access private    
    */
    private function _veri_log()
    {
    	if ($this->session->userdata('logged_in')) {
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }
    
    /**
    * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
    *@access  public
    */
	public function index()
	{
		if($this->_veri_log())
        {
        	$session_data = $this->session->userdata('logged_in');
            $tit = array ('titulo' => 'Panel Administrador');
            $data['usuario'] = $session_data['usuario'];
			$dato = array(
			        'productos' => $this->producto_model->get_producto()
                    );
			$this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('panel_views',$data);
            $this->load->view('producto/all_productos_views',$dato);
            $this->load->view('partes/footer_views');
		}else{
            redirect('login', 'refresh');
        }
	}

    function insert_view()
    {
        if($this->_veri_log())
        {
            $session_data = $this->session->userdata('logged_in');
            $tit = array ('titulo' => 'Panel Administrador');
            $data['usuario'] = $session_data['usuario'];
            $tipo['tipo_producto'] = $this->producto_model->get_tipo(); 
            
            $this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('panel_views',$data);
            $this->load->view('producto/agregar_producto_views',$tipo);
            $this->load->view('partes/footer_views');
        }else{
            redirect('ingreso', 'refresh');
        }
    }
    
    
    function insert_producto()
    {
<<<<<<< HEAD
		//Validación del formulario
		$this->form_validation->set_rules('nombre_p', 'Nombre', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
		$this->form_validation->set_rules('stock_minimo', 'Stock_minimo', 'required|numeric');
		$this->form_validation->set_rules('talle', 'Talle', 'required|numeric');
		$this->form_validation->set_rules('genero', 'Genero', 'required');
=======
        //Validación del formulario
        $this->form_validation->set_rules('nombre_p', 'Nombre_p', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('stock_minimo', 'Stock minimo', 'required|numeric');
        $this->form_validation->set_rules('talle', 'Talle', 'required');
        $this->form_validation->set_rules('genero', 'Genero', 'required');
>>>>>>> 2768aa336831d60375ea566baba93a58d3f2fe82
        $this->form_validation->set_rules('tipo_producto', 'Tipo_producto', 'required');
        $this->form_validation->set_rules('filename', 'Imagen', 'callback__image_upload');
        

        //Mensaje del form_validation
        $this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');
        $this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>'); 
        
        
        if (!$this->form_validation->run())
        {
            if($this->_veri_log())
            {
                $session_data = $this->session->userdata('logged_in');
                $tit = array ('titulo' => 'Panel Administrador');
                $data['usuario'] = $session_data['usuario'];
                $tipo['tipo_producto'] = $this->producto_model->get_tipo(); 

                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$data);
                $this->load->view('producto/agregar_producto_views',$tipo);
                $this->load->view('partes/footer_views');
            }
            else
            {
                redirect( 'login','refresh');
            }
        }
        else
        {
            $this->_image_upload();         
        }
    }
    
    
    function _image_upload()
<<<<<<< HEAD
	{
        $this->load->library('upload');
            
            //Comprueba si hay un archivo cargado
            if (!empty($_FILES['filename']['name']))
=======
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
                    'talle'=>$this->input->post('talle',true),
                    'genero'=>$this->input->post('genero',true),
                    'tipo_producto'=>$this->input->post('tipo_producto',true),
                    'imagen'=>$url
                );
                $datos_libros = $this->producto_model->create_producto($data);
                redirect('productos','refresh');
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
            redirect ('insertar_producto', 'refresh');
        }
    }

   

    function edit_p()   //en progreso
    {
        $id = $this->uri->segment(2);
        
        $datos_product = $this->producto_model->update_producto($id);
        if ($datos_product != FALSE)
        {
            foreach ($datos_product->result() as $row) {
                $nombre= $row->nombre;
                $precio = $row->precio;
                $imagen = $row->imagen;
                $stock = $row->stock;
                $stock_minimo = $row->stock_minimo;
                $talle = $row->talle;
                $genero = $row->genero;
            }
            $data = array('producto_model' =>$datos_product,
                          'id'=>$id,
                          'nombre'=>$nombre,
                          'precio' =>$precio,
                          'imagen'=>$imagen,
                          'stock'=>$stock,
                          'stock_minimo'=>$stock_minimo,
                          'talle'=>$talle,
                          'genero'=>$genero
                    );
        }else{
            return FALSE;
        }
        if($this->_veri_log())
        {
            $session_data = $this->session->userdata('logged_in');
            $tit = array ('titulo' => 'Panel Administrador');
            $dato['usuario'] = $session_data['usuario'];
            $tipo['tipo_producto'] = $this->producto_model->get_tipo(); 
            
            $this->load->view('partes/head_views',$tit);
            $this->load->view('partes/cabecera_views');
            $this->load->view('panel_views',$dato);
            $this->load->view('producto/edit_producto_views', array_merge($tipo,$data));
            $this->load->view('partes/footer_views');
        }
        else{
            redirect('login', 'refresh');
        }
    }
      
    function editar_producto()
    {
        //Validación del formulario
        $this->form_validation->set_rules('nombre_p', 'Nombre_p', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        $this->form_validation->set_rules('stock_minimo', 'Stock minimo', 'required|numeric');
        $this->form_validation->set_rules('talle', 'Talle', 'required');
        $this->form_validation->set_rules('genero', 'Genero', 'required');
        $this->form_validation->set_rules('tipo_producto', 'Tipo_producto', 'required');
        
        //Mensaje del form_validation
        $this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio al intentar modificar estaba vacio</div>');
        $this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico al intentar modificar estaba vacio</div>'); 

        $id = $this->uri->segment(2);
        $datos_product = $this->producto_model->update_producto($id);
        foreach ($datos_product->result() as $row) {
                $imagen = $row->imagen;
            }
        $data = array(
                    'id'=>$id,
                    'nombre'=>$this->input->post('nombre_p',true),
                    'precio'=>$this->input->post('precio',true),
                    'imagen'=>$imagen,
                    'stock'=>$this->input->post('stock',true),
                    'stock_minimo'=>$this->input->post('stock_minimo',true),
                    'tipo_producto'=>$this->input->post('tipo_producto',true),
                    'talle'=>$this->input->post('talle',true),
                    'genero'=>$this->input->post('genero',true)
                    );
        if ($this->form_validation->run()==FALSE)
        {
            if($this->_veri_log())
            {
                $session_data = $this->session->userdata('logged_in');
                $tit = array ('titulo' => 'Panel Administrador');
                $dato['usuario'] = $session_data['usuario'];
                $tipo['tipo_producto'] = $this->producto_model->get_tipo(); 

                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$dato);
                $this->load->view('producto/edit_producto_views', array_merge($tipo,$data));
                $this->load->view('partes/footer_views');
            }else{
                redirect('login', 'refresh');
            }
        }
        else
        {
            $this->_image_modif();      
        }
    }


    function _image_modif()
    {
        //Cargo la libreria para subir archivos
        $this->load->library('upload');
        // Obtengo el id del producto
        $id = $this->uri->segment(2);
        // Array de datos para obtener datos del producto sin la imagen 
        $dat = array(
                    'nombre'=>$this->input->post('nombre_p',true),
                    'precio'=>$this->input->post('precio',true),
                    'stock'=>$this->input->post('stock',true),
                    'stock_minimo'=>$this->input->post('stock_minimo',true),
                    'tipo_producto'=>$this->input->post('tipo_producto',true),
                    'talle'=>$this->input->post('talle',true),
                    'genero'=>$this->input->post('genero',true)
                    );
                    
        // Si la iamgen esta vacia se asume que no se modifica
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
                // Agrego la imagen si se modifico.  
                $dat['imagen']=$url;
                // Actualiza datos del libro
                $this->producto_model->set_producto($id, $dat);
                redirect('productos', 'refresh');
            }
            else
            {
                //Mensaje de error si no existe imagen correcta
                $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';
                $this->form_validation->set_message('_image_modif',$imageerrors );
                return false;
            } 
        }else{
            $this->producto_model->set_producto($id, $dat);
            redirect('productos', 'refresh');
        }
    }
    
    function remove_producto(){
        $id = $this->uri->segment(2);
        $data = array(
            'eliminado'=>'SI'
            );
        $this->producto_model->estado_producto($id, $data);
        redirect('productos', 'refresh');
    }
    
    function active_producto(){
        $id = $this->uri->segment(2);
        $data = array(
            'eliminado'=>'NO'
            );
        $this->producto_model->estado_producto($id, $data);
        redirect('productos', 'refresh');
    }
    
    function all_uniformes(){
        if($this->_veri_log())
        {
            $session_data = $this->session->userdata('logged_in');
            $dat['usuario'] = $session_data['usuario'];
            $tit = array('titulo' => 'Panel Administrador');
            
            if (!$this->producto_model->get_producto_uniformes()) {
                redirect('productos', 'refresh');
            }else
>>>>>>> 2768aa336831d60375ea566baba93a58d3f2fe82
            {
                $data = array('productos' => $this->producto_model->get_producto_uniformes());
                
                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$dat);
                $this->load->view('producto/all_uniformes_views',$data);
                $this->load->view('partes/footer_views');
            }
        }else{
            redirect('ingreso', 'refresh');
        }
    }
    
    function all_prendas(){
        if($this->_veri_log())
        {
            $session_data = $this->session->userdata('logged_in');
            $dat['usuario'] = $session_data['usuario'];
            $tit = array('titulo' => 'Panel Administrador');
            
            if (!$this->producto_model->get_producto_prendas()) {
                redirect('productos', 'refresh');
            }else
            {
                $data = array('productos' => $this->producto_model->get_producto_prendas());
                
                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$dat);
                $this->load->view('producto/all_prendas_views',$data);
                $this->load->view('partes/footer_views');
            }
        }else{
            redirect('ingreso', 'refresh');
        }
    }
    
    
    
    function productos_eliminados(){
        if($this->_veri_log())
        {
            $session_data = $this->session->userdata('logged_in');
            $dat['usuario'] = $session_data['usuario'];
            $tit = array('titulo' => 'Panel Administrador');
            
            if (!$this->producto_model->not_active_productos()) {
                redirect('productos', 'refresh');
            }else
            {
                $data = array('productos' => $this->producto_model->not_active_productos());
                
<<<<<<< HEAD
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
=======
                $this->load->view('partes/head_views',$tit);
                $this->load->view('partes/cabecera_views');
                $this->load->view('panel_views',$dat);
                $this->load->view('producto/all_productos_eliminados_views',$data);
                $this->load->view('partes/footer_views');
>>>>>>> 2768aa336831d60375ea566baba93a58d3f2fe82
            }
        }else{
            redirect('ingreso', 'refresh');
        }
    }
    
 }