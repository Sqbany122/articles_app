<?php 
    require_once("C:/xampp/htdocs/articles_app/components/header.php");
    if (!isset($_SESSION['id'])) {
        header('Location: C:/xampp/htdocs/articles_app/login.php');
    }
    require_once("C:/xampp/htdocs/articles_app/components/nav.php")
?> 

    <div class="mainBox h-100 w-100 container">
        <div class="d-flex justify-content-center align-items-start h-100 py-5">
            <form class="w-50" action="add_article.php" method="POST">
                <h1 class="text-center">Add article</h1>
                <input type="text" name="article_title" placeholder="Article title" class="form-control mb-2" />
                <textarea rows="10" class="w-100 form-control mb-2" name="article_body" placeholder="Article body"></textarea>
                <select name="article_category" class="form-control mb-2">
                    <option selected disabled hidden>Select article category</option>
                    <option value="sport">Sport</option>
                    <option value="television">Television</option>
                    <option value="hobby">Hobby</option>
                    <option value="work">Work</option>
                    <option value="travels">Travels</option>
                </select>
                <input type="submit" name="add_article" class="btn btn-primary" value="Add article" />
            </form>
        </div>
    </div>

<?php 
    if ($_POST["add_article"]) {
        require_once("C:/xampp/htdocs/articles_app/classes/Articles.php");
        $article = new Articles();
        $article->addArticle($_POST['article_title'], $_POST['article_body'], $_POST["article_category"]);
    }

    require_once("C:/xampp/htdocs/articles_app/components/footer.php"); 
?>