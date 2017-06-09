<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Usuario_model extends CI_Model
    {
        function validar_usuario($username, $password)
        {
            $query = $this->db->get_where('usuarios', array('usuario'=>$username,'pass'=>base64_encode($password)), 1);
            
            if($query->num_rows() == 1)
            {
                return $query->result();
            }
            else
            {
                return FALSE;
            }
        }
        
        function add_user($data)
		{
			$this->db->insert('usuarios', $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
        
        function get_usuarios()
        {
            $query = $this->db->get_where("usuarios", array('eliminado' => 'NO'));
            if($query->num_rows()>0) {
                return $query;
            } else {
                return FALSE;
            }        
        }
        
        function update_socios($id)
        {
            $query = $this->db->get_where('usuarios', array('id' => $id),1);
            if($query->num_rows() == 1)
            {
                return $query;
            }
            else
            {
                return FALSE;
            }
        }
        
        function set_socio($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('usuarios', $data);
            if($query)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
		
        function valid_user_ajax($usuario, $pass){
            $query = $this->db->get_where('usuarios', array('usuario'=>$usuario,'pass'=>base64_encode($pass)));

            if($query->num_rows() >0){
                return $query->row();
            }else{
                echo 'error';
            }
        }
        
        function estado_usuario($id, $data){
            $this->db->where('id', $id);
            $query = $this->db->update('usuarios', $data);
            if($query) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        function not_active_usuario()
        {
            $query = $this->db->get_where("usuarios", array('eliminado' => 'SI'));
            if($query->num_rows()>0)
            {
                return $query;
            }else{
                return FALSE;
            }
        }
        
        function get_tipo()
        {
            $query = $this->db->get("tipo_usuario");
            //si hay resultados
            if ($query->num_rows() > 0) {
                // almacenamos en una matriz bidimensional
                foreach($query->result() as $row){
                     $datos[$row->id] =$row->descripcion;
                }
                return $datos;
            }
        }
        
        
        
    }