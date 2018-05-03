<?php 

declare (strict_types = 1 );

namespace MVC\Controller;

use MVC\Model\ProductRepository;

class ProductController extends AbstractController
{
    public function indexAction($type)
    {
        $username = $this->getSession('username');

        $loggedin = isset($username);

        $products = (new ProductRepository())->getProducts($type);
        
        /* print_r($products);die; */
                
        return $this->render('/../View/menu_tpl.php', ['products' => $products, 'loggedin' =>$loggedin, 'username' =>$username, 'products' => $products, 'type' => $type]);
    }

    public function viewAction()
    {
        $burgers = (new ProductRepository())->getProducts('Burgers');

        $pizza = (new ProductRepository())->getProducts('Pizzas');

        $pasta = (new ProductRepository())->getProducts('Pasta');

        $drinks = (new ProductRepository())->getProducts('Drinks');

        return $this->render('/../View/create_order_tpl.php', ['burgers' => $burgers, 'pizzas' => $pizza, 'pastas' => $pasta, 'drinks' => $drinks]);
    }
}