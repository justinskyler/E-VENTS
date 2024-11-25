<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../core/Router.php";
$router=require_once "../core/routes.php";
// require_once  "../app/Controller/UserController.php"; 
// use core\Router\Router;

// $router = new Router();
// $router->get('/user/newuser', [UserController::class, 'newuser']);
// $router->post('/user/newuser', [UserController::class, 'newuser']);
$router->run();
