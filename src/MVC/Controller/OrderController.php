<?php

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\OrderRepository;
use MVC\Model\ProductRepository;

class OrderController extends AbstractController
{
    private $action;

    private $order;

    private $checklist;

    private $basket;

    public function viewAction()
    {
        $this->isAuthenticated();

        return $this->render('/../View/print_order_tpl.php');
    }

    public function indexAction()
    {
        $this->isAuthenticated();
        
        $this->checklist = $this->getPost('checklist');

        //check if there is a pending order for this user
        //if there isn't create a new order
        if ($this->action->getOrder($this->getSession('username')) == false && !empty($this->checklist)) {

            $this->action->createOrder($this->getSession('username'), $this->checklist);
        
        //if there isnt and there are no products checked, reload page
        } else if ($this->action->getOrder($this->getSession('username')) == false){

            $menu = $this->action->getMenu();

            return $this->render('/../View/create_order_tpl.php', ['menu' => $menu]);
        
        //if there is already a pending order for this user, update it
        } else {

            $this->action->updateOrder($this->action->getOrder($this->getSession('username'))[0]['order_id'], $this->checklist);
        }

        //create product
        $this->order = $this->action->getOrder($this->getSession('username'));

        $basket = $this->action->getOrderItems($this->getSession('username'), $this->order[0]['order_id']);

        return $this->render('/../View/print_order_tpl.php', ['products' => $basket, 'sum' => $this->order[0]['summa'] ]);
    } 

    public function cancelAction()
    {
        $this->isAuthenticated();

        $username = $this->getSession('username');

        $loggedin = isset($username);

        $this->id = $this->action->getOrder($this->getSession('username'));

        $cancelOrder = $this->action->cancelOrder($this->id[0]['order_id']);
    }

    public function confirmAction()
    {
        $this->isAuthenticated();

        $username = $this->getSession('username');

        $loggedin = isset($username);

        $this->id = $this->action->getOrder($username);        

        $sum = $this->action->getOrder($this->getSession('username'));

        $confirmOrder = $this->action->confirmOrder($this->id[0]['order_id']);

        return $this->render('/../View/home_tpl.php', ['loggedin' => $loggedin, 'username' => $username, 'sum' => $sum[0]['order_id'], 'products' => $this->basket]);
    }

    public function __construct()
    {
        $this->action = new OrderRepository();
        $this->order[0][0] = [];
        $this->id[0][0] = [];
        $this->checklist = null;
        $this->basket = null;
    }
}