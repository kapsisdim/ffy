<?php 

use MVC\Controller\PageNotFoundException;

require_once __DIR__.'/../vendor/autoload.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
session_start();
try {
    switch(true) {
        case $path == '/' && $method == 'GET':
            $controller = new MVC\Controller\HomeController();
            echo $controller->indexAction();            
            break;
        case $path == '/signin' && $method == 'POST':
            $controller = new MVC\Controller\SigninController();
            echo $controller->indexAction();
            break;
        case $path == '/register' && $method == 'POST';
            $controller = new MVC\Controller\RegistrationController();
            echo $controller->registerAction();
            break; 
        case $path == '/signin' && $method == 'GET':
            $controller = new MVC\Controller\SigninController();
            echo $controller->viewAction();
            break;
        case $path == '/register' && $method == 'GET':
            $controller = new MVC\Controller\RegistrationController();
            echo $controller->viewAction();
            break;
        case preg_match('/\/products\/(\w+)/', $path, $args) && $method == 'GET': 
            $type = $args[1];
            $controller = new MVC\Controller\ProductController();
            echo $controller->indexAction($type);
            break;
        case $path == '/products' && $method == 'GET':
            $controller = new MVC\Controller\ProductController();
            echo $controller->viewAction();
            break;
        case $path == '/logout' && $method == 'POST':        
            $controller = new MVC\Controller\LogoutController();            
            echo $controller->indexAction();
            break;
        case $path == '/yourorder' && $method == 'POST':
            $controller = new MVC\Controller\OrderController();
            echo $controller->indexAction();
            break;
/*         case $path == '/products/your_order' && $method == 'GET':
            $controller = new MVC\Controller\OrderController();
            echo $controller->viewAction();
            break; */
        case $path == '/confirm' && $method == 'POST':
            $controller = new MVC\Controller\OrderController();
            echo $controller->confirmAction();
            break;
        case $path == '/cancel' && $method == 'POST':
            $controller = new MVC\Controller\OrderController();
            echo $controller->cancelAction();
            break;
        default:
            throw new PageNotFoundException('Page not found, 404');
            break;    
    }
} catch(AuthenticationException $e) {
        echo 'no authentication';
} catch(PageNotFoundException $e) {
        echo 'KETO .1.';
} catch(Exception $e) {
    echo $e->getMessage();
}