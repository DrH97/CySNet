<?php

$db = null;



ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('VIEW_ROOT', APP_ROOT . '/views/');
define('BASE_URL', 'http://localhost/CS-Project/');
define('VIEW_URL', BASE_URL .'app/views/');
define('ASSETS', BASE_URL . 'assets' . '/');

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'techcrowd2';

//$db = new PDO('mysql:host=127.0.0.1;dbname=tech-e', 'root', '');
//$db1 = mysqli_connect('localhost','root','');
//    mysqli_select_db($db1, 'tech-e');
//require 'functions.php';

require 'DatabaseSchema.php';

$db = new DatabaseSchema($host, $username, $password, $database);

require_once 'DatabaseTables.php';
$tb = new DatabaseTables($host, $username, $password, $database);
$tb->createTables();