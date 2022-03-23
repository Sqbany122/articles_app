<?php require_once("C:/xampp/htdocs/aurora/components/header.php"); ?>

    <div class="mainBox h-100 container">
        <div class="d-flex justify-content-center align-items-center h-100">
            <form action="register.php" class="text-center" method="POST">
                <h1 class="mb-3">Register</h1>
                <input type="text" class="form-control mb-2" name="username" />
                <input type="password" class="form-control mb-2" name="password" />
                <input type="password" class="form-control" name="repeat_password" />
                <input type="submit" class="btn btn-primary my-2 w-100" name="register" value="Register" />
                <span>Arleady registered? <a href="/aurora/login.php">Login now!</a></span>
            </form>
        </div>
    </div>

<?php 
    if ($_POST['register']) {
        require_once("C:/xampp/htdocs/aurora/classes/Auth.php");
        $auth = new Auth();
        $auth->register($_POST['username'], $_POST['password'], $_POST['repeat_password']);
    }

    require_once("C:/xampp/htdocs/aurora/components/footer.php"); 
?>