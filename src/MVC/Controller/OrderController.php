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

    private $quantity;

    public function viewAction()
    {
        $this->isAuthenticated();

        $this->order = $this->action->getOrder($this->getSession('username'));

        $this->basket = $this->action->getOrderItems($this->getSession('username'), $this->order['order_id']);

        return $this->render('/../View/print_order_tpl.php', ['products' => $this->basket, 'sum' => $this->order['summa'], 'username' => $this->getSession('username')]);
    }

    public function showAllOrderAction()
    {
        $this->isAuthenticated();

        $username = $this->getSession('username');

        $loggedin = isset($username);

        $orders = $this->action->getAllOrders($this->getSession('username'));

        $order = $this->action->getOrder($this->getSession('username'));

        $basket = $this->action->getOrderItems($this->getSession('username'), $order['order_id']);

        return $this->render('/../View/your_orders_tpl.php', ['loggedin' => $loggedin, 'orders' => $orders, 'products' => $basket, 'sum' => $order['summa'], 'username' => $this->getSession('username')]);
    }
    
    public function indexAction()
    {
        $this->isAuthenticated();
        
        $this->checklist = $this->getPost('checklist');

        $this->quantity = $this->getPost('quantity');

        if (!empty($this->checklist)) {
            $keys = array_combine($this->checklist, $this->checklist);

            $this->quantity = array_intersect_key($this->quantity, $keys);
        }
        //check if there is a pending order for this user
        //if there isn't create a new order
        if ($this->action->getOrder($this->getSession('username')) == false && !empty($this->checklist)) {

            $this->action->createOrder($this->getSession('username'), $this->checklist, $this->quantity);
        
        //if there isnt and there are no products checked, reload page
        } else if ($this->action->getOrder($this->getSession('username')) == false){

            
            $this->action = new ProductController();

            return $this->action->viewAction();
        
        //if there is already a pending order for this user, update it
        } else {

            $this->action->updateOrder($this->action->getOrder($this->getSession('username')) ['order_id'], $this->checklist, $this->quantity);
        }

        //create product
        $this->order = $this->action->getOrder($this->getSession('username'));

        $this->basket = $this->action->getOrderItems($this->getSession('username'), $this->order['order_id']);

        header ("Location: /yourorder");
    } 

    public function cancelAction()
    {
        $this->isAuthenticated();

        $username = $this->getSession('username');

        $this->id = $this->action->getOrder($this->getSession('username'));

        $cancelOrder = $this->action->cancelOrder($this->id['order_id']);

        return $home = (new \MVC\Controller\HomeController())->indexAction();

    }

    public function confirmAction()
    {
        $this->isAuthenticated();

        $username = $this->getSession('username');

        $this->order = $this->action->getOrder($username);

        $confirmOrder = $this->action->confirmOrder($this->order['order_id']);

        return $home = (new \MVC\Controller\HomeController())->indexAction();
    }

    public function __construct()
    {
        $this->action = new OrderRepository();
        $this->checklist = null;
        $this->basket = null;
    }
}