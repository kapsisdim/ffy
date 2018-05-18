<?php 

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\ProductRepository;
use MVC\Model\OrderRepository;
use MVC\Model\OrderModel;
use MVC\Model\MemberRepository;
use MVC\Model\MemberModel;

class ProductController extends AbstractController
{
    private $order;
    private $basket;
    private $user;

    public function indexAction($type)
    {
        $username = $this->getSession('username');

        $products = (new ProductRepository())->getProducts($type);

        if (!empty($username)) {
            $member = (new MemberRepository())->getMember($username);

            $this->user = new MemberModel($member['username'], $member['password'], $member['email']);

            $this->order = (new OrderRepository())->getOrder($this->getSession('username'));


            if (!empty($this->order)) {                
                $this->order = new OrderModel($this->order['username'], $this->order['order_id'], $this->order['status'], $this->order['summa']);

                $this->basket = (new OrderRepository())->getOrderItems($this->getSession('username'), $this->order->getId());        

            }
        }
        return $this->render('/../View/menu_tpl.php', ['products' => $products, 'basket' => $this->basket, 'member' => $this->user, 'type' => $type, 'sum' => $this->order]);

    }

    public function viewAction()
    {
        $this->isAuthenticated();

        $username = $this->getSession('username');
        if (!empty($username)) {
            $member = (new MemberRepository())->getMember($username);

            $this->user = new MemberModel($member['username'], $member['password'], $member['email']);


            $this->order = (new OrderRepository())->getOrder($this->getSession('username'));            
            
            if (!empty($this->order)) {
                $this->basket = (new OrderRepository ())->getOrderItems($this->getSession('username'), $this->order['order_id']);
            }
        }
        $burgers = (new ProductRepository())->getProducts('Burgers');

        $pizza = (new ProductRepository())->getProducts('Pizzas');

        $pasta = (new ProductRepository())->getProducts('Pasta');

        $drinks = (new ProductRepository())->getProducts('Drinks');


        return $this->render('/../View/create_order_tpl.php', ['burgers' => $burgers, 'pizzas' => $pizza, 'pastas' => $pasta, 'drinks' => $drinks, 'member' => $this->user, 'username' => $this->user->getUsername(), 'products' => $this->basket, 'sum' => $this->order['summa'], 'products' => $this->basket]);
    }

    public function __construct()
    {
        $this->order = "";
        $this->basket = "";
        $this->user="";
    }
}