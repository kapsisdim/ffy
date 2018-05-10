<?php 

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\Validator;
use MVC\Model\MemberRepository;
use MVC\Model\OrderRepository;

class RegistrationController extends AbstractController
{
    private $username;

    private $email;

    private $password_1;

    private $password_2;

    public function viewAction()
    {
        return $this->render('/../View/signup_tpl.php');
    }

    public function registerAction()
    {
        $this->username = $this->getPost('username');

        $this->email = $this->getPost('email');

        $this->password_1 = md5($this->getPost('password_1'));
        
        $this->password_2 = md5($this->getPost('password_2'));

        $validation = (new Validator())->registerValidation($this->username, $this->email, $this->password_1, $this->password_2);

        if($validation) {

            $member = (new MemberRepository())->createMember($this->username, $this->email, $this->password_1);

            $_SESSION['username'] = $this->username;

            header ("Location: /");
            
        } else {
            return $this->render('/../View/signup_tpl.php' );
        }

    }
}