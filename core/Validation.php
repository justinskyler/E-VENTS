<?php
class Validation{
    private $errors = [];
    public function getErrors(){
        return $this->errors;
    }
    public function validateEmail($email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $this->errors['email']='Example: jhonDoe@gmail.com';
            return false;
        }
        return true ;
    }

    public function validatePassword($password){
        $pattern='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        if(!preg_match($pattern,$password) || empty($password)){
            $this->errors['password']='Password must contains min 8 char: upper and lowercase, number, special char';
            return false;
        }
        return true;
    }
    public function validateInputString($input){
        $pattern='/^[a-zA-Z]+$/';
        if(!preg_match($pattern,$input)){
            $this->errors['firstname']='Only char allowed';
            return false;
        }
        return true;
    }
    public function validateInputInteger($input){
        if(!filter_var($input,FILTER_VALIDATE_INT) || empty($input)){
            $this->errors['']='Only Integer allowed';
            return false;
        }
        return true;
    }
    public function validatePhone($phone){
        $pattern='/^(509)[2-5][0-9]{7}+$/';
        if(!preg_match($pattern,$phone) || empty($phone)){
            $this->errors['phone']='Example:509(2-5)XXXXXXX';
            return false;
        }
        return true;
    }
}