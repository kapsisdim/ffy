<?php 

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\Autheticator;
use MVC\Model\OrderRepository;

class SigninController extends AbstractController
{
    private $username;

    private $password;

    private $order;

    public function viewAction()
    {
        return $this->render('/../View/signin_tpl.php');
    }

    public function indexAction()
    {
        $this->username = $this->getPost('username');
        $this->password = md5($this->getPost('password'));

        $authetication = (new Autheticator())->userAutheticator($this->username, $this->password);

        if ($authetication) {

            $_SESSION['username'] = $this->username;
            
            header ("Location: /");

        } else {

            return $this->render('/../View/signin_tpl.php');
        }
    }

    public function __construct()
    {
    }
}