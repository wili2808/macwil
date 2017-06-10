<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Consulta_Model extends CI_Model
{
    public function create_consulta($data){
        $this->db->insert('consultas', $data);
    }
    
    function get_consultas()
    {
        $query = $this->db->get_where("consultas", array('eliminado' => 'NO'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    function get_consulta_id($id){
        $query = $this->db->get_where('consultas', array('id' => $id),1);
        
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    function estado_consulta($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('consultas', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
}
