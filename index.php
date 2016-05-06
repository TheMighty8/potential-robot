<?php
require "vendor/autoload.php";

use Store\Classes\Forms\LoginForm;
use Store\Classes\HtmlBuilders\HtmlBuilder;

$form = new LoginForm('placeholder.php', 'POST');
$form = $form->getAsHtml();
$indexPage = new HtmlBuilder([$form]);

echo $indexPage->getAsHtml();

die();


