<?php
namespace Store\Layout;

require "../../../vendor/autoload.php";

use Store\Classes\Controller\PageInformationController;

$informationMessage = PageInformationController::getInformationMessage();
echo $informationMessage->getAsHtml();