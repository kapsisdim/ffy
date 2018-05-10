<?php

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\Validator;
use MVC\Model\MemberRepository;
use MVC\Model\OrderRepository;

class MemberController extends AbstractController
{
    private $action;

    private $password_1;

    private $password_2;

    public function indexAction()
    {
        $this->isAuthenticated();

        $username = $this->getSession('username');

        $order = $this->action->getOrder($username);

        $basket = $this->action->getOrderItems($username, $order['order_id']);

        return $this->render('/../View/account_settings_tpl.php', ['username' => $username, 'order' => $order, 'products' => $basket, 'sum' => $order['summa'] ]);

    }

    public function updateAction()
    {
        $username = $this->getSession('username');

        $this->password_1 = md5($this->getPost('password_1'));
        
        $this->password_2 = md5($this->getPost('password_2'));

        $validation = (new Validator())->changePasswordValidation($this->password_1, $this->password_2);

        if ($validation) {

            $member = (new MemberRepository())->updateMemberPassword($this->password_1, $username);

            header ("Location: /");

        } else {
            header ("Location: /settings");
        }
    }

    public function __construct()
    {
        $this->action = new OrderRepository();
    }
}