<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 09/05/2016
 * Time: 08:24
 */

namespace Store\Classes\Controller;

use Store\Classes\Database\UserDAO;
use Store\Classes\Util\ObjectFactoryService;
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
        $session = ObjectFactoryService::getSession();
        $findUser = new UserDAO();
        $result = $findUser->findUser($email, $password);
        
        if ($result == null) :
            return false;
        else:
            $session->user=$email;
            return $result;
        endif;
    }

    public static function validateLoggedInUser()
    {
        $session = ObjectFactoryService::getSession();

        if (isset($session->user)){
            return $session->user;
        }else{
            header("Location : " . Config::getProjectRootUrl().'app/Layout/message.php');
        }
        
    }
}