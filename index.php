<?php
require_once 'vendor/autoload.php';

use Store\Classes\Controller\LoginController;
use Store\Classes\Controller\PageInformationController;
use Store\Classes\Controller\POSTController;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlElements\Forms\LoginForm;
use Store\Classes\Model\User;
use Store\Classes\Util\ObjectFactoryService;
use Store\Classes\Util\Session\SessionManager;

if (POSTController::verifyPostParameters($_POST)) {
    $user = new User(ObjectFactoryService::getDbConnection());
    $user->setEmail($_POST['email'])
        ->setPassword($_POST['password']);
    LoginController::validateLogin($user);
}

if(LoginController::validateLoggedInUser()){
    PageInformationController::setInformationMessage("Welcome! " . SessionManager::get('user'));
    PageInformationController::setInformationMessageType('success');
    $indexPage = PageInformationController::getInformationMessage();
}else{
    $form = new LoginForm('index.php', 'POST');

    $form = $form->getAsHtml();

    $indexPage = new HtmlBuilder([$form]);
}

echo $indexPage->getAsHtml();

die();


