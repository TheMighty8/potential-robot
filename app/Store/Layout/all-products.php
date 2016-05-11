<?php
require "../../../vendor/autoload.php";


use Store\Classes\Controller\LoginController;
use Store\Classes\HtmlBuilders\HtmlBuilder;
use Store\Classes\HtmlElements\Tables\AllProductsTable;


LoginController::verifyLoginPermissions();

$table = new AllProductsTable("table table-hover table-stripped");
$table = $table->getAsHtml();
$allProductsTablePage = new HtmlBuilder([$table]);

echo $allProductsTablePage->getAsHtml();

die();
