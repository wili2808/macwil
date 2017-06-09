<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Producto_Model extends CI_Model
{
   
    public function __construct() {
        parent::__construct();
    }
   
    function get_producto()
    {
        $query = $this->db->get_where("productos", array('eliminado' => 'NO'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    function get_producto_uniformes()
    {
        $query = $this->db->get_where("productos", array('eliminado' => 'NO','tipo_producto' => '1'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    function get_producto_prendas()
    {
        $query = $this->db->get_where("productos", array('eliminado' => 'NO','tipo_producto' => '2'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    public function create_producto($data){
        $this->db->insert('productos', $data);
    }

    function update_producto($id){
        $query = $this->db->get_where('productos', array('id' => $id),1);
        
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function set_producto($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    function estado_producto($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function not_active_productos()
    {
        $query = $this->db->get_where("productos", array('eliminado' => 'SI'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
    
    function get_tipo()
    {
        $query = $this->db->get('tipo_producto');
        // si hay resultados
        if ($query->num_rows() > 0)
        {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row){
                 $datos[$row->id] =$row->descripcion;
            }
            return $datos;
        }
    }
}
