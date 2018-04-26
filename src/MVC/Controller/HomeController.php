<?php 

declare(strict_types = 1);

namespace MVC\Controller;

use MVC\Model\OrderRepository;

class HomeController extends AbstractController
{
    private $sum;

    private $action;

    private $basket;

    private $order;

    public function indexAction()
    {
        $username = $this->getSession('username');

        $loggedin = isset($username);

        $this->order = $this->action->getOrder($this->getSession('username'));

        if (!empty($this->order)) {

            $this->basket = $this->action->getOrderItems($this->getSession('username'), $this->order[0]['order_id']);

            return $this->render('/../View/home_tpl.php', ['loggedin' => $loggedin, 'username' => $username, 'products' => $this->basket, 'sum' => $this->order[0]['summa']]);
        }

        return $this->render('/../View/home_tpl.php', ['loggedin' => $loggedin, 'username' => $username, 'products' => $this->basket, 'sum' => $this->order]);        
    }

    public function __construct()
    {
        $this->action = new OrderRepository();

        $this->basket = null;
    }
}