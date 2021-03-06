<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carrito_model extends CI_Model {

// Get all details ehich store in "products" table in database.
public function get_all()
{
$query = $this->db->get('productos');
return $query->result_array();
}
    
public function get_all_uniformes()
{
$query = $this->db->get('productos', array('eliminado' => 'NO','tipo_producto' => '1'));
return $query->result_array();
}

// Insert customer details in "customer" table in database.
public function insert_customer($data)
{
$this->db->insert('customers', $data);
$id = $this->db->insert_id();
return (isset($id)) ? $id : FALSE;
}

// Insert order date with customer id in "orders" table in database.
public function insert_order($data)
{
$this->db->insert('ventas_cabecera', $data);
$id = $this->db->insert_id();
return (isset($id)) ? $id : FALSE;
}

// Insert ordered product detail in "order_detail" table in database.
public function insert_order_detail($data)
{
$this->db->insert('ventas_detalle', $data);
}
}
?>