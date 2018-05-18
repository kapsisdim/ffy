<?php 

declare(strict_types = 1);

namespace MVC\Controller;

use MVC\Model\OrderRepository;
use MVC\Model\OrderModel;
use MVC\Model\MemberModel;
use MVC\Model\MemberRepository;

class HomeController extends AbstractController
{
    private $basket;
    private $user;
    private $order;

    public function indexAction()
    {
        $username = $this->getSession('username');

        if (!empty($username)) {

            $member = (new MemberRepository())->getMember($username);

            $user = new MemberModel($member['username'], $member['password'], $member['email']);

            $this->order = (new OrderRepository())->getOrder($user->getUsername());

            if (!empty($this->order)) {
                $this->order = new OrderModel($this->order['username'], $this->order['order_id'], $this->order['status'], $this->order['summa'] );
                $this->basket = (new OrderRepository())->getOrderItems($this->order->getUsername(), $this->order->getId());
            }

            return $this->render('/../View/home_tpl.php', ['member' => $user, 'username' => $user->getUsername(), 'products' => $this->basket, 'sum' => $this->order]);
        }
            
        return $this->render('/../View/home_tpl.php', ['member' => $this->user]);
    }

    public function __construct()
    {
        $this->basket = "";
        $this->user = "";
        $this->order = "";
    }
}