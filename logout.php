<?php 

    require_once("C:/xampp/htdocs/articles_app/components/header.php");
    require_once("C:/xampp/htdocs/articles_app/classes/Auth.php");
    $auth = new Auth();
    $auth->logout();