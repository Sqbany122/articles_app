<?php 
    require_once("C:/xampp/htdocs/articles_app/components/header.php");
    if (!isset($_SESSION['id'])) {
        header('Location: /articles_app/login.php');
    } 
    require_once("C:/xampp/htdocs/articles_app/components/nav.php");
    require_once("C:/xampp/htdocs/articles_app/classes/Articles.php");
    $article = new Articles();
?> 

    <div class="mainBox w-100 px-4 pt-5">
        <div class="grid">
            <?php $articles = $article->getArticles(); ?>
        </div>
    </div>

<?php require_once("C:/xampp/htdocs/articles_app/components/footer.php"); ?>