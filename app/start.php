<?php

ini_set('display_errors', 'On');

define('APP_ROOT', __DIR__);
define('VIEW_ROOT', APP_ROOT . '/views');
define('BASE_URL', 'http://localhost/tech-e');
define('IMAGES', BASE_URL . '/images' . '/');

$db = new PDO('mysql:host=127.0.0.1;dbname=tech-e', 'root', '');
$db1 = mysqli_connect('localhost','root','');
    mysqli_select_db($db1, 'tech-e');
require 'functions.php';

$dbt = new DatabaseSchema('localhost', 'root', '', 'techcrowd');

