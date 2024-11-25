<?php
require_once "../app/Controller/UserController.php";
require_once "../app/Controller/HomeController.php";

use app\Controller\HomeController;
use core\Router\Router;

$router = new Router();


$router->get('/', [HomeController::class, 'index']);
//User
$router->get('/user/login',[UserController::class,'login']);
$router->post('/user/login',[UserController::class,'login']);
$router->get('/user/logout',[UserController::class,'logout']);
$router->get('/user/newuser', [UserController::class, 'newuser']);
$router->post('/user/newuser', [UserController::class, 'newuser']);

return $router;
