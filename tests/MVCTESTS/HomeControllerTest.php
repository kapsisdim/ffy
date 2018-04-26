<?php

declare(strict_types = 1);

namespace MVCTESTS;

//use Core\FixturesHelper;
use PHPUnit\Framework\TestCase;
use MVC\Controller\HomeController;

class HomeControllerTest extends TestCase
{
  // use FixturesHelper;

   public function atestTransformer()
   {
       $user = $this->users('john_doe_user');
       $data = json_decode(json_encode($user), true);

       $this->assertArrayHasKey('id', $data);
       $this->assertArrayHasKey('web_login', $data);
       $this->assertArrayHasKey('created_at', $data);
       $this->assertArrayHasKey('updated_at', $data);

       $dateRegex = '/\d\d\d\d-\d\d-\d\dT\d\d:\d\d:\d\d\+\d\d:\d\d/';
       $this->assertRegExp($dateRegex, $data['created_at']);
       $this->assertRegExp($dateRegex, $data['updated_at']);
   }

   public function testHomeController()
   {
        $controller = new HomeController();
        $output = $controller->indexAction();

        $this->assertNotNull($output);
   }

   public function setUp()
   {
        $_SESSION =  [];
   }
}