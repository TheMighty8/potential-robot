<?php
namespace Store\Layout;

require "../../../vendor/autoload.php";

use Store\Classes\HtmlBuilders\HtmlBuilder;

$informationMessage = HtmlMessageBuilder::ShowMessage("You do not have permission for this feature :(", "danger");

$message = new HtmlBuilder([$informationMessage]);

echo $message;