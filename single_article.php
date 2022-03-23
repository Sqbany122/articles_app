<?php 
    require_once("C:/xampp/htdocs/articles_app/components/header.php");
    if (!isset($_SESSION['id'])) {
        header('Location: /articles_app/login.php');
    } 
    require_once("C:/xampp/htdocs/articles_app/components/nav.php");
    require_once("C:/xampp/htdocs/articles_app/classes/Articles.php");
    $article = new Articles();
?> 

    <div class="mainBox d-flex justify-content-center align-items-center w-100 px-4 pt-5 container">
        <div class="d-flex w-50 justify-content-center align-items-center py-5">
            <?php 
                if (isset($_GET['id'])) {
                    $article->getSingleArticle($_GET['id']);
                }
            ?>
        </div>
    </div>

<?php require_once("C:/xampp/htdocs/articles_app/components/footer.php"); ?>