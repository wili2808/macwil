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

// Rutas para views de Productos y Servicios //
$route['uniformes']   = "home/uniformes";
$route['prendas']     = "home/prendas";
$route['serigrafia']  = "home/serigrafia";
$route['sublimacion'] = "home/sublimaciones";
$route['bordados']    = "home/bordados";

//Rutas para manejo de Usuarios //
$route['login']              = "home/login";
$route['registro']           = "home/registro";
$route['perfil/(:num)']      = 'usuario_controller/index/$1';
$route['verificar_login']    = "usuario_controller/verifico_login";
$route['verificar_registro'] = "usuario_controller/verifico_registro";

$route['salir']              = 'usuario_controller/logout';

//Rutas para manejo de Productos //
$route['insertar_producto'] = "producto_controller/form_insertar_p";




$route['consultas'] = "consultas_controller";
$route['comercializacion'] = "comercializacion_controller";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */