<?php 

session_start();
define('DB_NAME', 'aurora');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

require_once("C:/xampp/htdocs/aurora/classes/MySQL.php");
$mysql = new MySQL();