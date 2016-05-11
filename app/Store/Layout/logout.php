<?php
require "../../../vendor/autoload.php";

use Store\Classes\Util\Session\SessionManager;
use Store\Config\Config;

SessionManager::forget();
header(Config::getIndexLocationStringUrl());

