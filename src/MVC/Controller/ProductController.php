<?php 

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\ProductRepository;
use MVC\Model\OrderRepository;

class ProductController extends AbstractController
{
    private $action;

    public function indexAction($type)
    {
        $username = $this->getSession('username');

        $loggedin = isset($username);

        $products = (new ProductRepository())->getProducts($type);

        $order = $this->action->getOrder($this->getSession('username'));

        if (!empty($order)) {

            $basket = $this->action->getOrderItems($this->getSession('username'), $order['order_id']);        
                            
            return $this->render('/../View/menu_tpl.php', ['products' => $products, 'basket' => $basket, 'loggedin' => $loggedin, 'username' => $username, 'type' => $type]);

        } else {

            return $this->render('/../View/menu_tpl.php', ['loggedin' => $loggedin, 'username' => $username, 'products' => $products, 'type' => $type]);
        }
    }

    public function viewAction()
    {
        $username = $this->getSession('username');

        $loggedin = isset($username);

        $burgers = (new ProductRepository())->getProducts('Burgers');

        $pizza = (new ProductRepository())->getProducts('Pizzas');

        $pasta = (new ProductRepository())->getProducts('Pasta');

        $drinks = (new ProductRepository())->getProducts('Drinks');

        $order = $this->action->getOrder($this->getSession('username'));

        $basket = $this->action->getOrderItems($this->getSession('username'), $order['order_id']);

        return $this->render('/../View/create_order_tpl.php', ['burgers' => $burgers, 'pizzas' => $pizza, 'pastas' => $pasta, 'drinks' => $drinks, 'loggedin' => $loggedin, 'username' => $username, 'products' => $basket, 'sum' => $order['summa'], 'products' => $basket]);
    }

    public function __construct()
    {
        $this->action = new OrderRepository();
    }
}