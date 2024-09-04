<?php

session_start();

$path = $_SERVER['SERVER_NAME'] . "://" . $_SERVER['SERVER_NAME']  .  $_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);
define('ROOT',$path);
define('ASSETS',$path);
include '../app/init.php';
show($_SERVER);
$app = new App();