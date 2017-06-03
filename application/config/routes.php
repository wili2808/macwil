<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

// Ruta de inicio por defecto //
$route['default_controller'] = "home";


//Rutas para manejo de Usuarios - Ingreso y cierre de sesion//
$route['login']               = "usuario_controller";
$route['login_ajax']          = "usuario_controller/valid_login_ajax";
$route['verificar_login']     = "usuario_controller/verifico_login";
$route['salir']               = 'usuario_controller/logout';
$route['logout_ajax']         = "usuario_controller/logout_ajax";
//Rutas para manejo de Usuarios - Registro, Panel//
$route['registro']            = "usuario_controller/registro";
$route['verificar_registro']  = "usuario_controller/verifico_registro";
$route['panel']               = "panel_controller";
//Rutas para manejo de Usuarios - Lista y Modificacion de usuarios//
$route['lista_usuarios']      = 'usuario_controller/all';
$route['edit_usuario/(:num)'] = "usuario_controller/edit/$1";
$route['usuario_up/(:num)']   = "usuario_controller/editar_socio/$1";


// Rutas para views de Productos y Servicios //
$route['uniformes']   = "home/uniformes";
$route['prendas']     = "home/prendas";
$route['serigrafia']  = "home/serigrafia";
$route['sublimacion'] = "home/sublimaciones";
$route['bordados']    = "home/bordados";
//Rutas para manejo de Productos //
$route['insertar_producto'] = "producto_controller";
$route['registro_producto'] = "producto_controller/insert_producto";




$route['consultas'] = "consultas_controller";
$route['comercializacion'] = "comercializacion_controller";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */