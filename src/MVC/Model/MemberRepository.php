<?php

namespace MVC\Model;

use MVC\Model\Database;

class MemberRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

/*     public function getMember($username, $password)
    {
        $sth = $this->connection->prepare('SELECT member_id AS id, username, email, password FROM members WHERE username = ? AND password = ?');  
        $sth->execute([$username, mb5($password)]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        echo 'result of getMember';
        print_r($result);die;

        return $result;
    } */

    public function createMember($username, $email, $password)
    {
        //no md5, change later
        $sth =  $this->connection->prepare('INSERT INTO members(username, email, password) VALUES (?, ?, ?)');
        $sth->execute([$username, $email, $password]);
    }

}