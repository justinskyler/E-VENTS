<?php
require realpath(__DIR__ . "/../../core/Controller.php");
require realpath(__DIR__ . "/../../core/Validation.php");
require_once __DIR__ . "/../Model/User.php";
class UserController extends Controller
{

    public function newuser()
    {
        $isValid=true;
        $errors=[];
        $validation = new Validation();
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // if($validation->validateInputString($_POST['firstname']))
            // {
            //     $isValid=false;
            //     $errors['firstname']=$validation->getErrors();
            // }else{
            //     $errors = $validation->getErrors();
            // }


            // if (!$isValid) {
            //     require __DIR__ . "/../View/User.php";
            //     return;
            // }

        $userdata =
            [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
                'created_at'=>date('Y-m-d H:i:s')
            ];
        $user = new User();
        if ($user->createUser($userdata)) {
            $user->redirect("/");
            // $this->loadView("User", ["message" => "Enregistrement réussi!"]);
        } else {
            echo "Erreur lors de l'enregistrement de l'utilisateur.";
        }
    }else{
        require __DIR__ . "/../View/User.php";
    }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $credentials=[
                'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                'password' =>$_POST['password']
            ];
            $user= new User();
            $login= $user->signIn($credentials);
            if(!$login){
               echo'Email not found';
               exit;
            }
            if(!password_verify($credentials['password'],$login['password'])){
                echo'Password denied';
                exit;
            }
            session_start();
            $_SESSION['username']=$login['firstname'];
           $user->redirect("/");
           
        }
       require __DIR__ .'/../View/login.php';
    }

    public function logout()
    {
        $user= new User();
        session_start();
        session_unset();
        session_destroy();
        $user->redirect("/");
    }
}
