<?php
require "vendor/autoload.php";

use Store\Classes\Controller\FormController;
use Store\Classes\Forms\LoginForm;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlBuilders\HtmlMessageBuilder;

if (FormController::verifyPostParameters($_POST)) {
    FormController::validateLogin($_POST['email'], $_POST['password']);
}

if (isset($session->user)) {
    $welcomeMessage = HtmlMessageBuilder::ShowMessage("Welcome {$session->user}!", "success");
    $indexPage = new HtmlBuilder([$welcomeMessage]);
} else {
    $form = new LoginForm('index.php', 'POST');
    $form = $form->getAsHtml();
    $indexPage = new HtmlBuilder([$form]);
}

echo $indexPage->getAsHtml();

$validate = FormController::validateLoggedInUser();
var_dump($validate);

die();


