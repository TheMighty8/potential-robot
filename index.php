<?php
require_once 'vendor/autoload.php';

use Store\Classes\Controller\FormController;
use Store\Classes\Forms\LoginForm;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\Util\ObjectFactoryService;

$_POST['email'] = "mightynumbereight@yahoo.com";
$_POST['password'] = "12345";

if (FormController::verifyPostParameters($_POST)) {
    FormController::validateLogin($_POST['email'], $_POST['password']);
}

$form = new LoginForm('index.php', 'POST');
$form = $form->getAsHtml();
$indexPage = new HtmlBuilder([$form]);

echo $indexPage->getAsHtml();

FormController::validateLoggedInUser();

var_dump(ObjectFactoryService::getSession());
die();


