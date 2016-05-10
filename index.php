<?php
require_once 'vendor/autoload.php';

use Store\Classes\Controller\FormController;
use Store\Classes\Forms\LoginForm;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlBuilders\HtmlMessageBuilder;
use Store\Classes\Util\Session\SessionManager;

if (FormController::verifyPostParameters($_POST)) {
    FormController::validateLogin($_POST['email'], $_POST['password']);
}

if(FormController::validateLoggedInUser()){
    $welcomeMessage = new HtmlMessageBuilder();

    $welcomeMessage->BuildMessage('Welcome! ' . SessionManager::get('user'), 'success');

    $welcomeMessage = $welcomeMessage->getAsHtml();

    $indexPage = new HtmlBuilder([$welcomeMessage]);
}else{
    $form = new LoginForm('index.php', 'POST');

    $form = $form->getAsHtml();

    $indexPage = new HtmlBuilder([$form]);
}

echo $indexPage->getAsHtml();

die();


