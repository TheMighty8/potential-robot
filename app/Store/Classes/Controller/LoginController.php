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

class LoginController
{
    public static function validateLogin(User $user)
    {
        $findUser = new UserDAO();
        $result = $findUser->findUser($user);

        if ($result == false) {
            $message = 'Login failure, check your credentials';
            PageInformationController::setInformationMessage($message);
            PageInformationController::setInformationMessageType('danger');
            echo PageInformationController::getInformationMessage()->getAsHtml();
            die();
        }
        else{
            SessionManager::insert('user', $user->getEmail());
        }
    }

    public static function validateLoggedInUser()
    {
        if (SessionManager::get('user') != null) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifyLoginPermissions($message, $type)
    {
        if (!LoginController::validateLoggedInUser()){
            PageInformationController::setInformationMessage($message);
            PageInformationController::setInformationMessageType($type);
            echo PageInformationController::getInformationMessage()->getAsHtml();
            die();
        }
    }
}