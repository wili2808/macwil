<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Producto_model extends CI_Model
    {
        public function __construct()
        {
        parent::__construct();
        }
        
        public function create_producto($data)
        {
            $this->db->insert('productos', $data);
        }
        
        
        
        
    }