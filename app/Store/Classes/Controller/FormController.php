<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 09/05/2016
 * Time: 08:24
 */

namespace Store\Classes\Controller;

use Store\Classes\Database\UserDAO;
use Store\Classes\Util\Session\SessionManager;
use Store\Config\Config;

class FormController
{
    public static function verifyPostParameters(&$post)
    {
        if (isset($post) && !empty($post)) {
            foreach ($post as $item) {
                if (empty($item)) {
                    return false;
                }
            }

            return true;
        } else {
            return false;
        }
    }

    public static function validateLogin($email, $password)
    {
        $findUser = new UserDAO();
        $result = $findUser->findUser($email, $password);

        if ($result == null) :
            return false;
        else:
            SessionManager::insert('user', $email);
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

    public static function varifyUserPermissions()
    {
        if (!self::validateLoggedInUser()){
            header(Config::getIndexLocationStringUrl());
            SessionManager::insert('danger', 'You don\'t have permission to use this feature');
        }
    }
}