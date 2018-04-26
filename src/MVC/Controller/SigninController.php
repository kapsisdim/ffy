<?php 

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\Autheticator;

class SigninController extends AbstractController
{
    public function viewAction()
    {
        return $this->render('/../View/signin_tpl.php');
    }

    public function indexAction()
    {
        $username = $this->getPost('username');
        $password = md5($this->getPost('password'));

        $authetication = (new Autheticator())->userAutheticator($username, $password);

        if ($authetication) {
            $_SESSION['username'] = $username; 
            $loggedin = true;

            return $this->render('/../View/home_tpl.php',['loggedin' => $loggedin, 'username' => $username]);
            
        } else {

            return $this->render('/../View/signin_tpl.php');
        }
    }
}