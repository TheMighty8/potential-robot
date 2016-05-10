<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 10/05/2016
 * Time: 07:57
 */

namespace Store\Classes\Util\Session;

use stackSess;

class SessionManager
{
    private $session;

    public function __construct()
    {
        $this->session = new stackSess();
    }
    
    public  function start()
    {
        ini_set('session.save_handler', 'files');

        session_set_save_handler($this->session, true);

        session_save_path(__DIR__ . 'sessions');

        $this->session->start();

        if (!$this->session->isValid(50)) {
            $this->session->destroy();
        }
    }

    public  function insert($name, $value)
    {
        $this->session->put($name, $value);
    }

    public function get($name)
    {
       return $this->session->get($name);
    }

    public  function remove($name, $value)
    {
        $this->session->remove($name, $value);
    }

    public  function forget()
    {
        $this->session->forget();
    }
}