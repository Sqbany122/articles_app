<?php require_once("C:/xampp/htdocs/aurora/components/header.php"); ?>

    <div class="mainBox h-100 container">
        <div class="d-flex justify-content-center align-items-center h-100">
            <form class="text-center">
                <h1 class="mb-3">Login</h1>
                <input type="text" class="form-control mb-2" name="username" />
                <input type="text" class="form-control" name="password" />
                <input type="submit" class="btn btn-primary my-2 w-100" name="login" value="Login" />
                <span>Don't have account? <a href="/aurora/register.php">Register now!</a></span>
            </form>
        </div>
    </div>

<?php require_once("C:/xampp/htdocs/aurora/components/footer.php"); ?>