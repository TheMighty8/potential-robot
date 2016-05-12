<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 06/05/2016
 * Time: 10:07
 */
require "../../../vendor/autoload.php";

use Store\Classes\Controller\LoginController;
use Store\Classes\Controller\POSTController;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlElements\Forms\InsertUpdateDeleteForm;

if (POSTController::verifyPostParameters($_POST)){

}

LoginController::verifyLoginPermissions('You need to log in to use this feature', 'danger');

$insertProductForm = new InsertUpdateDeleteForm('insert-product.php', 'POST', 'false');

$insertProductForm = $insertProductForm->getAsHtml();

$insertProductPage = new HtmlBuilder([$insertProductForm]);

echo $insertProductPage->getAsHtml();


die();