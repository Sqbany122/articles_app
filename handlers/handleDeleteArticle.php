<?php
    require_once("C:/xampp/htdocs/articles_app/components/header.php");
    require_once("C:/xampp/htdocs/articles_app/classes/Articles.php");
    $article = new Articles();
    $id = $_POST['article_id'];
    $article->deleteArticle($id);
    