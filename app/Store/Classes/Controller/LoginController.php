<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 11/05/2016
 * Time: 10:46
 */

namespace Store\Classes\Controller;

use Store\Classes\Database\UserDAO;
use Store\Classes\Model\User;
use Store\Classes\Util\Session\SessionManager;
use Store\Config\Config;

class LoginController
{
    public static function validateLogin(User $user)
    {
        $findUser = new UserDAO();
        $result = $findUser->findUser($user);

        if ($result == false) :
            return false;
        else:
            SessionManager::insert('success', 'Login realizado com sucesso');
            SessionManager::insert('user', $user->getEmail());
            return $result;
        endif;
    }

    public static function validateLoggedInUser()
    {
        if (SessionManager::get('user') != null) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyLoginPermissions()
    {
        if (!LoginController::validateLoggedInUser()){
            SessionManager::insert('danger', 'You don\'t have permission to use this feature');
            header(Config::getIndexLocationStringUrl());
        }
    }
}