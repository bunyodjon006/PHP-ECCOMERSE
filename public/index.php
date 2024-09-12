<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
ini_set("error_reporting",E_ALL);
session_start();

$path = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace("/index.php", "", $path);
$port =8000;
$path = "$path:$port?url=";
define('ROOT', $path);
define('ASSETS', $path . 'assets/');
include '../app/init.php';

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";
// exit();
// print_r(ROOT);
$app = new App();
