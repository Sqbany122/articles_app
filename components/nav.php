<nav class="navbar navbar-expand-lg navbar-light bg-light px-4 w-100 shadow">
  <a class="navbar-brand" href="/articles_app/articles.php">ArticlesApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php 
        if ($_SESSION['role'] == 'admin') {
          echo '
            <li class="nav-item active">
              <a class="nav-link" href="/articles_app/admin_panel.php">Admin panel</a>
            </li>
          ';
        }
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="/articles_app/articles.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/articles_app/add_article.php">Add article</a>
      </li>
    </ul>
    <span class="navbar-text mr-0">
        <a href="/articles_app/logout.php">Logout</a>
    </span>
  </div>
</nav>