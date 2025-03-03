<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// $routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');


// -----------------de aloso rutas-----------
$routes->get('usuarios', 'UsuarioController::index'); // Listar usuarios
$routes->get('usuarios/save', 'UsuarioController::saveUsuario', ['filter' => 'filtroAcceso']); // Crear usuario
$routes->get('usuarios/save/(:num)', 'UsuarioController::saveUsuario/$1',['filter' => 'filtroAcceso']); // Editar usuario
$routes->post('usuarios/save', 'UsuarioController::saveUsuario',['filter' => 'filtroAcceso']); // Guardar nuevo usuario (POST)
$routes->post('usuarios/save/(:num)', 'UsuarioController::saveUsuario/$1',['filter' => 'filtroAcceso']); // Actualizar usuario (POST)
$routes->get('usuarios/delete/(:num)', 'UsuarioController::delete/$1',['filter' => 'filtroAcceso']); // Eliminar usuario
$routes->get('usuarios/baja/(:num)', 'UsuarioController::baja/$1',['filter' => 'filtroAcceso']); // Dar de baja usuario
$routes->get('usuarios/exportarCSV', 'UsuarioController::exportarCSV');//exportar usuario


// ----------------- Rutas de Peces ---------------------

// Listar peces
$routes->get('peces', 'PecesController::index'); // Muestra todos los peces activos

// Crear pez
$routes->get('peces/save', 'PecesController::savePeces',['filter' => 'filtroAcceso']); // Mostrar formulario para crear pez
$routes->post('peces/save', 'PecesController::savePeces',['filter' => 'filtroAcceso']); // Guardar nuevo pez (POST)

// Editar pez
$routes->get('peces/save/(:num)', 'PecesController::savePeces/$1',['filter' => 'filtroAcceso']); // Mostrar formulario de edición para pez (con ID)
$routes->post('peces/save/(:num)', 'PecesController::savePeces/$1',['filter' => 'filtroAcceso']); // Actualizar pez (POST)

// Dar de baja pez
$routes->get('peces/baja/(:num)', 'PecesController::baja/$1',['filter' => 'filtroAcceso']); // Dar de baja pez (actualiza la fecha de baja)

//exportar peces
// Si tienes un prefijo 'public' en la URL, puedes configurarlo de la siguiente manera
$routes->get('peces/exportarCSV', 'PecesController::exportarCSV');



// ----------------- Rutas de Tanques ---------------------

/// Rutas de Tanques
$routes->get('tanques', 'TanquesController::index'); // Muestra todos los tanques activos

// Mostrar formulario para crear tanque
$routes->get('tanques/save', 'TanquesController::saveTanques',['filter' => 'filtroAcceso']);

// Guardar nuevo tanque (POST)
$routes->post('tanques/save', 'TanquesController::saveTanques',['filter' => 'filtroAcceso']);

// Mostrar formulario de edición para tanque (con ID)
$routes->get('tanques/save/(:num)', 'TanquesController::saveTanques/$1',['filter' => 'filtroAcceso']);

// Actualizar tanque (POST)
$routes->post('tanques/save/(:num)', 'TanquesController::saveTanques/$1',['filter' => 'filtroAcceso']);

// Dar de baja tanque
$routes->get('tanques/baja/(:num)', 'TanquesController::baja/$1',['filter' => 'filtroAcceso']); // Dar de baja tanque (actualiza la fecha de baja)

//exportar tank
$routes->get('tanques/exportarCSV', 'TanquesController::exportarCSV');



// ----------------- Rutas de Proveedores ---------------------

// Listar proveedores
$routes->get('proveedores', 'ProveedoresController::index');

// Crear proveedor
$routes->get('proveedores/save', 'ProveedoresController::saveProveedores',['filter' => 'filtroAcceso']);
$routes->post('proveedores/save', 'ProveedoresController::saveProveedores',['filter' => 'filtroAcceso']);

// Editar proveedor
$routes->get('proveedores/save/(:num)', 'ProveedoresController::saveProveedores/$1',['filter' => 'filtroAcceso']);
$routes->post('proveedores/save/(:num)', 'ProveedoresController::saveProveedores/$1',['filter' => 'filtroAcceso']);

// Dar de baja proveedor
$routes->get('proveedores/baja/(:num)', 'ProveedoresController::baja/$1',['filter' => 'filtroAcceso']);

//exportar los proveedores
$routes->get('proveedores/exportar', 'ProveedoresController::exportarProveedores');



//login

$routes->get('login', 'LoginController::login'); // Muestra el formulario de login.
$routes->post('login/process', 'LoginController::processLogin'); // Procesa el inicio de sesión.
$routes->get('logout', 'LoginController::logout'); // Cierra sesión y redirige al login.




// app/Config/Routes.php

$routes->get('register', 'RegistroController::register'); // Muestra el formulario de registro
$routes->post('register/process', 'RegistroController::processRegister'); // Procesa el formulario de registro


//calendario-----------------------------------------------------
// $routes->get('/fetch-events', 'EventController::fetchEvents');
// $routes->post('/add-event', 'EventController::addEvent');
// $routes->delete('/delete-event/(:num)', 'EventController::deleteEvent/$1');
// $routes->get('/calendar', 'EventController::showCalendar');

$routes->get('/calendar', 'EventController::showCalendar'); // Mostrar el calendario
$routes->get('/fetch-events', 'EventController::fetchEvents'); // Obtener eventos
$routes->post('/add-event', 'EventController::addEvent'); // Agregar un evento
$routes->delete('/delete-event/(:num)', 'EventController::deleteEvent/$1'); // Eliminar un evento



//ruta denegadaa
// app/Config/Routes.php

$routes->get('/acceso-denegado', 'AccesoDenegadoController::index');  // Ruta para la página de acceso denegado


   

//pedidos
$routes->get('pedidos', 'PedidosController::index'); // Ruta para listar los pedidos
$routes->get('pedidos/save/(:num)', 'PedidosController::save/$1'); // Ruta para editar un pedido (con ID)
$routes->get('pedidos/save', 'PedidosController::save'); // Ruta para agregar un nuevo pedido
$routes->get('pedidos/cambiar_estado/(:num)', 'PedidosController::cambiar_estado/$1'); // Ruta para cambiar el estado de un pedido



// ----------------------------
$routes->get('index-copia', 'Pages::viewIndexCopia');
