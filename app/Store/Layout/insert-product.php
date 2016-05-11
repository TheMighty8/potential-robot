<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 10:07
 */
require "../../../vendor/autoload.php";

use Store\Classes\Controller\LoginController;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlElements\Forms\InsertUpdateDeleteForm;

LoginController::verifyLoginPermissions();

$insertProductForm = new InsertUpdateDeleteForm('placeholder.php', 'POST', '', 'false');
$insertProductForm = $insertProductForm->getAsHtml();

$insertProductPage = new HtmlBuilder([$insertProductForm]);

echo $insertProductPage->getAsHtml();

die();