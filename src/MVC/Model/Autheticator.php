<?php

declare (strict_types = 1);

namespace MVC\Model;

use MVC\Model\Autheticator;

class Autheticator
{
    private $username;
    private $password;
    private $authetication;
    private $autheticator;
     

    public function __construct()
    {
        $this->autheticator = false;
        $this->authetication = new Authetication();
    }

    public function userAutheticator($username, $password)
    {
        if(!empty($this->authetication->autheticationAction($username, $password))) {

            $this->autheticator = true;
        }
        
        return $this->autheticator;
    }
}