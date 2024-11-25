<?php
namespace app\Controller;
class HomeController{
    public function index(){
        include __DIR__ . '../../View/home.php';
    }
}