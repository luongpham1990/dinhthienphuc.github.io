<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 07/08/2016
 * Time: 10:08 CH
 */

//database info
define("DB_TYPE", 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DBNAME', 'blog');

//path to app folder
define('PATH_APPLICATION', __DIR__ . "/app");

//original path, head to parent folder
define('BASE_PATH', "http://localhost/the-flash");

//set environment to dev or user
define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
} else {
    error_reporting(0);
    ini_set("display_errors", 0);
}