<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 03/05/2016
 * Time: 10:06
 */

namespace Store\Layout;
use Store\Classes\Forms\LoginForm;

class IndexLogin
{
    private $loginForm;
    public function __construct($action, $method)
    {
        $this->loginForm = new LoginForm($action, $method);
    }

    public function printFormToHtml()
    {
        return $this->loginForm->getAsHtml();
    }
}