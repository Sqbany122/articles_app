<?php require_once("C:/xampp/htdocs/articles_app/components/header.php"); ?>

    <div class="mainBox h-100 container">
        <div class="d-flex justify-content-center align-items-center h-100">
            <form class="text-center" action="login.php" method="POST">
                <h1 class="mb-3">Login</h1>
                <input type="text" class="form-control mb-2" name="username" />
                <input type="password" class="form-control" name="password" />
                <input type="submit" class="btn btn-primary my-2 w-100" name="login" value="Login" />
                <span>Don't have account? <a href="/articles_app/register.php">Register now!</a></span>
            </form>
        </div>
    </div>

<?php 
    if ($_POST['login']) {
        require_once("C:/xampp/htdocs/articles_app/classes/Auth.php");
        $auth = new Auth();
        $auth->login($_POST['username'], $_POST['password']);
    }

    require_once("C:/xampp/htdocs/articles_app/components/footer.php"); 
?>