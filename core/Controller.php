<?php
class Controller{
    public function loadView($views, $data=[])
    {
        extract($data);
        require "../app/View/$views.php";
    }
}