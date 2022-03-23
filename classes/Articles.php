<?php 

class Articles extends MySQL {
    private $user_id;

    public function __construct() {
        parent::__construct();
        $this->user_id = $_SESSION['id'];
    }
    
    public function addArticle($title, $body, $category) {
        if (empty($title) || empty($body) || empty($category)) {
            throw new Exception("You must fill in all the fields to add an article!");
        }

        try {
            $add_article = $this->query("
                INSERT INTO articles (title, body, category, user_id, created_at, updated_at)
                VALUES ('".$title."', '".$body."', '".$category."', ".$this->user_id.", NOW(), NOW())
            ");

            if (!$add_article) {
                throw new Exception("Something went wrong!");
            }

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function getArticles() {
        $articlesString = "";

        $articles = $this->query("
            SELECT a.*, b.username
            FROM articles a
            LEFT JOIN users b on b.id = a.user_id
            WHERE a.status = 'added'
            ORDER BY a.created_at DESC
        ");

        if ($articles) {
            foreach ($articles as $article) {
                $articlesString .= '
                    <a class="article d-flex flex-column shadow rounded" href="/articles_app/single_article.php?id='.$article['id'].'&action=view">
                        <img class="w-100" src="/articles_app/inc/images/article_image.png" />
                        <div class="px-2 py-1">
                            <span class="d-block">Title: '.substr($article['title'], 0, 25).(strlen($article['title']) > 25 ? "..." : "").'</span>
                            <span class="d-block">Author: '.substr($article['username'], 0, 25).(strlen($article['username']) > 25 ? "..." : "").'</span>
                        </div>
                    </a>
                ';
            }
        }

        echo $articlesString;
    }

    public function getArticlesForAdmin() {
        $articlesString = "";

        $articles = $this->query("
            SELECT a.*, b.username
            FROM articles a
            LEFT JOIN users b on b.id = a.user_id
            ORDER BY a.created_at DESC
        ");

        if ($articles) {
            foreach ($articles as $article) {
                $articlesString .= '
                    <div class="article d-flex flex-row shadow rounded">
                        <img class="article_image" src="/articles_app/inc/images/article_image.png" />
                        <div class="px-2 py-1">
                            <span class="d-block">Title: '.substr($article['title'], 0, 25).(strlen($article['title']) > 25 ? "..." : "").'</span>
                            <span class="d-block">Author: '.substr($article['username'], 0, 25).(strlen($article['username']) > 25 ? "..." : "").'</span>
                            <span class="d-block">Stauts: '.$article['status'].'</span>
                            <span class="d-block">Added: '.$article['created_at'].'</span>
                            <span class="d-block">Last update: '.$article['updated_at'].'</span>
                            <a href="/articles_app/single_article.php?id='.$article['id'].'&action=view" style="color: #fff" class="btn btn-warning">View</a>';
                            if ($article['status'] == 'waiting') {
                                $articlesString .= '<form method="POST" action="/articles_app/handlers/handleAcceptArticle.php" class="d-inline">
                                    <input type="hidden" name="article_id" value="'.$article['id'].'" />
                                    <input type="submit" name="action" class="btn btn-success my-2" value="Accept">
                                </form>';
                            }
                            $articlesString .= '<form method="POST" action="/articles_app/handlers/handleEditArticle.php" class="d-inline">
                                <input type="hidden" name="article_id" value="'.$article['id'].'" />
                                <input type="submit" name="action" class="btn btn-primary my-2" value="Edit">
                            </form>
                            <form method="POST" action="/articles_app/handlers/handleDeleteArticle.php" class="d-inline">
                                <input type="hidden" name="article_id" value="'.$article['id'].'" />
                                <input type="submit" name="action" class="btn btn-danger my-2" value="Delete">
                            </form>
                        </div>
                    </div>
                ';
            }
        }

        echo $articlesString;
    }

    public function getSingleArticle($id) {
        $articleString = "";

        $article = $this->query("
            SELECT a.*, b.username
            FROM articles a
            LEFT JOIN users b ON b.id = a.user_id
            WHERE a.id = ".$id."
        ");

        if ($article) {
            $articleString .= '
                <div class="">
                    <h1 class="text-center">'.$article['title'].'</h1>
                    <div class="text-center mb-4">
                        <span class="px-4">Author: '.$article['username'].'</span>
                        <span class="px-4">Date: '.$article['created_at'].'</span>
                    </div>
                    <div class="article_body">'.$article['body'].'</div>
                </div>
            ';
        }

        echo $articleString;
    }

    public function acceptArticle($id) {
        try {
            $acceptArticle = $this->insertOrUpdate("
                UPDATE articles 
                SET 
                    status = 'added',
                    updated_at = NOW()
                WHERE id = ".$id."
            ");

            if (!$acceptArticle) {
                throw new Exception("Something went wrong!");
            } else {
                header("location: /articles_app/admin_panel.php");
                exit;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function deleteArticle($id) {
        try {
            $acceptArticle = $this->insertOrUpdate("
                DELETE 
                FROM articles 
                WHERE id = ".$id."
            ");

            if (!$acceptArticle) {
                throw new Exception("Something went wrong!");
            } else {
                header("location: /articles_app/admin_panel.php");
                exit;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}