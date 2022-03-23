<?php 
    require_once("C:/xampp/htdocs/articles_app/components/header.php");
    if (!isset($_SESSION['id'])) {
        header('Location: C:/xampp/htdocs/articles_app/login.php');
    }
?> 

    <div class="mainBox h-100 container">
        <span>Welcome <?php echo $_SESSION['username']; ?></span>
        <a href="/articles_app/logout.php" class="btn btn-primary">Logout</a>
    </div>

<?php require_once("C:/xampp/htdocs/articles_app/components/footer.php"); ?>