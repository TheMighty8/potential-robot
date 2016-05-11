<?php namespace Store\Classes\Database;

use Store\Classes\Model\User;
use Store\Classes\Util\ObjectFactoryService;
use Store\Classes\Util\Session\SessionManager;

class UserDAO
{
    private $connection;

    function __construct()
    {
        $this->connection = ObjectFactoryService::getDbConnection();
    }

    function findUser(User $user)
    {
        $queryEmail = "SELECT * FROM usuarios WHERE email='{$user->getEmail()}' LIMIT 1";
        $queryUser = "SELECT email FROM usuarios WHERE email='{$user->getEmail()}' AND senha='{$user->getPassword()}' LIMIT 1";

        $resultEmail = mysqli_query($this->connection, $queryEmail);
        if ($resultEmail == null){
            SessionManager::insert('danger', 'Email not registered');
            return false;
        }

        $resultUser = mysqli_query($this->connection, $queryUser);
        if ($resultUser == null){
            SessionManager::insert('danger', 'User not registered');
            return false;
        }

        return mysqli_fetch_assoc($resultUser);
    }
}