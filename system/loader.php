<?php

if(!defined("test")) { echo "forbidden access"; exit; }

date_default_timezone_set("Asia/Tehran");

ini_set( 'session.cookie_httponly' ,1 );
session_start();

require_once(getcwd() . "/system/db.php");
require_once(getcwd() . "/system/words.php");
require_once(getcwd() . "/system/config.php");
require_once(getcwd() . "/system/common.php");
require_once(getcwd() . "/system/autoload.php");
require_once(getcwd() . "/system/view.php");
require_once(getcwd() . "/system/telegram.php");
require_once(getcwd() . "/asset/nusoap/nusoap.php");
require_once(getcwd() . "/system/pay.php");




?>