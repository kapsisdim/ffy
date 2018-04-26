<?php

declare (strict_types = 1);

namespace MVC\Model;

class Errors
{
    private $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function setErrors($error)
    {
        array_push($this->error, $error);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}