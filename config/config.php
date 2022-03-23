<?php 

session_start();
define('DB_NAME', 'articles_app');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

require_once("C:/xampp/htdocs/articles_app/classes/MySQL.php");
$mysql = new MySQL();