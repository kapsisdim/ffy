<?php 

declare (strict_types = 1);

namespace MVC\Controller;

use MVC\Model\OrderRepository;
use MVC\Model\ProductRepository;

class CheckoutController extends AbstractController
{
    private $paymentMethod;
    private $deliveryMethod;
    private $basket;
    private $order;
    private $action;

    public function viewAction()
    {        
        $username = $this->getSession('username');

        $loggedin = isset($username);
        
        $this->paymentMethod = $this->getPost('payment_method');

        $this->deliveryMethod = $this->getPost('delivery_method');

        $this->order = $this->action->getOrder($this->getSession('username'));

        $this->basket = $this->action->getOrderItems($this->getSession('username'), $this->order['order_id']);
 

        return $this->render('/../View/checkout_tpl.php', ['loggedin' => $loggedin, 'username' => $username, 'paymentMethod' => $this->paymentMethod, 'deliveryMethod' => $this->deliveryMethod, 'sum' => $this->order['summa'], 'products' => $this->basket]);
    }
//change
    public function indexAction()
    {
        $this->paymentMethod = $this->getPost('payment_method');

        $this->deliveryMethod = $this->getPost('delivery_method');

        if ( (isset($this->paymentMethod)) && (isset($this->deliveryMethod)) ) {

            if ($this->paymentMethod === 'Cash' && $this->deliveryMethod === 'From Store') {
                header ("Location: /confirm");

            } else {
                
                echo $this->viewAction();
            }

        } else {

            header ("Location: /yourorder");
        }        
    }

    public function __construct()
    {
        $this->paymentMethod = NULL;
        $this->deliveryMethod = NULL;
        $this->action = new OrderRepository();
    }
}