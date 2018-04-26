<?php 

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\Validator;
use MVC\Model\MemberRepository;

class RegistrationController extends AbstractController
{
    public function viewAction()
    {
        return $this->render('/../View/signup_tpl.php');
    }

    public function registerAction()
    {
        $username = $this->getPost('username');

        $email = $this->getPost('email');

        $password_1 = md5($this->getPost('password_1'));
        
        $password_2 = md5($this->getPost('password_2'));

        $validation = (new Validator())->registerValidation($username, $email, $password_1, $password_2);

        if($validation) {

            $member = (new MemberRepository())->createMember($username, $email, $password_1);

            $loggedin = isset($username);
                        
            return $this->render('/../View/home_tpl.php', ['username' => $username, 'loggedin' => $loggedin]);
            
        } else {
            return $this->render('/../View/signup_tpl.php' );
        }

    }
}