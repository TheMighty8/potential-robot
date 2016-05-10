<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 10/05/2016
 * Time: 07:57
 */

namespace Store\Classes\Util\Session;


class SessionHandler
{
    public function start()
    {
        $session = new SecureSessionHandler('potato');

        ini_set('session.save_handler', 'files');

        session_set_save_handler($session, true);

        session_save_path(__DIR__ . '../../../../../Resources/sessions');

        $session->start();

        if (!$session->isValid(50)) {
            $session->destroy();
        }
    }

    public function insert($var)
    {

    }

    public function remove($var)
    {

    }

    public function forget()
    {

    }

    public function isValid($time)
    {

    }
}