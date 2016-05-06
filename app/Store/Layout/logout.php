<?php
require_once "_path.php";
require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'auto_loader_config.php';

User::logout(ObjectFactoryService::getSession());
header("Location: index.php");

