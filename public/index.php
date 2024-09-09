<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
ini_set("error_reporting",E_ALL);
session_start();

$path = $_SERVER['REQUEST_URI'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);
define('ROOT', $path);
define('ASSETS', $path . 'assets/');
include '../app/init.php';

$app = new App();
