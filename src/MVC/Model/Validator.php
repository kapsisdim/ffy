<?php

declare (strict_types = 1);

namespace MVC\Model;

use MVC\Model\Validation;

class Validator
{
    private $usernameValidator;

    private $emailValidator;

    private $passValidator;

    private $validator;

    private $validation;

    public function __construct()
    {
        $this->usernameValidator = false;
        $this->emailValidator = false;
        $this->validator = false;
        $this->passValidator = false;
        $this->validation = new Validation();
    }

    public function registerValidation($username, $email, $password_1, $password_2)
    {        
        if(empty($this->validation->usernameValidation($username))) {
            $this->usernameValidator = true;
        }

        if(empty($this->validation->emailValidation($email))) {
            $this->emailValidator = true;
        }

        if($this->validation->passwordValidation($password_1, $password_2)) {
            $this->passValidator = true;
        }

        if($this->usernameValidator == true && $this->emailValidator == true && $this->passValidator == true) {
            $this->validator = true;
        }

        return $this->validator;
    }

}