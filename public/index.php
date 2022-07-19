<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\EstateController;
use Controllers\SellerController;
use Controllers\PagesController;
use Controllers\LoginController;

$router = new Router;

$router->get('/admin', [EstateController::class, 'index']);

$router->get('/propiedades/crear', [EstateController::class, 'create']);
$router->post('/propiedades/crear', [EstateController::class, 'create']);
$router->get('/propiedades/actualizar', [EstateController::class, 'update']);
$router->post('/propiedades/actualizar', [EstateController::class, 'update']);
$router->post('/propiedades/eliminar', [EstateController::class, 'delete']);

$router->get('/vendedores/crear', [SellerController::class, 'create']);
$router->post('/vendedores/crear', [SellerController::class, 'create']);
$router->get('/vendedores/actualizar', [SellerController::class, 'update']);
$router->post('/vendedores/actualizar', [SellerController::class, 'update']);
$router->post('/vendedores/eliminar', [SellerController::class, 'delete']);

$router->get('/', [PagesController::class, 'index']);
$router->get('/nosotros', [PagesController::class, 'about']);
$router->get('/anuncios', [PagesController::class, 'announcements']);
$router->get('/anuncio', [PagesController::class, 'announcement']);
$router->get('/blog', [PagesController::class, 'blog']);
$router->get('/post', [PagesController::class, 'post']);
$router->get('/contacto', [PagesController::class, 'contact']);
$router->post('/contacto', [PagesController::class, 'contact']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->checkRoutes();
