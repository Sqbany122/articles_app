<?php 
    require_once("C:/xampp/htdocs/articles_app/components/header.php");
    if (!isset($_SESSION['id'])) {
        header('Location: C:/xampp/htdocs/articles_app/login.php');
    }

    if ($_SESSION['role'] != 'admin') {
        header('Location: /articles_app/articles.php');
    }
    require_once("C:/xampp/htdocs/articles_app/components/nav.php");
    require_once("C:/xampp/htdocs/articles_app/classes/Articles.php");
    $article = new Articles();
?> 

    <div class="mainBox w-100 px-4 pt-5">
        <div class="grid_admin">
            <?php $articles = $article->getArticlesForAdmin(); ?>
        </div>
    </div>

<?php require_once("C:/xampp/htdocs/articles_app/components/footer.php"); ?>