<?php

declare(strict_types = 1);

namespace MVC\Controller;

use MVC\Model\Template;
use MVC\Controller\AuthenticationException;

class AbstractController
{
    protected function render(string $template, $params = []) //initialize $params as empty to make it proeretiko
    {
        return (new Template())->render($template, $params);
    }

    protected function getPost(string $params, $default = null)
    {
    
        return array_key_exists($params, $_POST) ? $_POST[$params] : $default; //checks if $param exists in $_POST, if(true)->return $_POST[$param], else return $default
             
    }

    protected function getSession(string $params, $default = null)
    {
        return array_key_exists($params, $_SESSION) ? $_SESSION[$params] : $default;        
    } 
    
    protected function isAuthenticated()
    {
        if ($this->getSession('username')) {
            return true;            
        }

        throw new AuthenticationException();
    }
}