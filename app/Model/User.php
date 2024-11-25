<?php
require_once __DIR__ . "/../../core/Model.php";

class User extends Model
{
    public function createUser($userdata){
        if ($userdata===null){
            throw new Exception("User info is null", 1);
        }
        return $this->save("Users",$userdata);
    }
    public function redirect($url) {
        echo 'Congratulations, your account has been registered! Redirection ...' ;
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        exit;
    }
    public function signIn($data){
        if ($data===null){
            throw new Exception("Error Processing Request", 1);  
        }
        return $this->findBy("Users",$data);
    }
}