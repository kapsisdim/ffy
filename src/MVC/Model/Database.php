<?php 

namespace MVC\Model;

use PDO;

class Database
{
    private $dbh;

    public function __construct()
    {
        $dsn = 'mysql:dbname=ffy_dev;host=localhost';
        $user = 'admin1';
        $password = '1234';    
        
        $this->dbh = new PDO($dsn, $user, $password); 
    }

    public function getConnection()
    {
        return $this->dbh;
    }
}