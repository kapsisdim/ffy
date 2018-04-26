<?php

declare (strict_types = 1);

namespace MVC\Controller;

class LogoutController extends AbstractController
{
    public function indexAction()
    {
        session_unset();
              
        return $this->render('/../View/signin_tpl.php');
    }
}