<?php

const WEBSITE_TITLE = 'MY_SHOP';
//database name mana shu nomdagi eshop_db degan database ochamiz
const DB_NAME = "users";
const DB_USER = "root";
const DB_PASS = "";
const DEBUG = true;
const DB_TYPE = "mysql";
const THEME = 'eshop/';
const DB_HOST="localhost";
if(DEBUG){
ini_set('display_errors',1);
}
else {
    ini_set('display_errors',0);
}