<?php namespace Store\Classes\Database;

use Store\Classes\Model\User;
use Store\Classes\Util\ObjectFactoryService;

class UserDAO
{
    private $connection;

    function __construct()
    {
        $this->connection = ObjectFactoryService::getDbConnection();
    }

    function findUser(User $user)
    {
        $queryUser = "SELECT email FROM usuarios WHERE email='{$user->getEmail()}' AND senha='{$user->getPassword()}' LIMIT 1";
        $resultUser = mysqli_query($this->connection, $queryUser);
        if ($resultUser == null){
            return false;
        }
        return mysqli_fetch_assoc($resultUser);
    }
}