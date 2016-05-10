<?php
require "vendor/autoload.php";

use Store\Classes\Controller\FormController;
use Store\Classes\Forms\LoginForm;
use Store\Classes\HtmlBuilders\HtmlBuilder;

if (FormController::verifyPostParameters($_POST)) {
    FormController::validateLogin($_POST['email'], $_POST['password']);
}



    $form = new LoginForm('index.php', 'POST');
    $form = $form->getAsHtml();
    $indexPage = new HtmlBuilder([$form]);


echo $indexPage->getAsHtml();

$validate = FormController::validateLoggedInUser();
var_dump($validate);

die();


