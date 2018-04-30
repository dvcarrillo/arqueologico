<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 26/4/18
 * Time: 19:22
 */

class ArticleController
{
    public function __construct() {
        require_once('models/article.php');
    }

    public function index() {
        // Stores all information in a variable
        $articles = Article::all();
        require_once('views/articles/index.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }

    public function show() {
        // An URL is expected of form ?option=article&id=XX
        // without an ID, it redirects to the error page
        $articles = Article::all();

        if ((!isset($_GET['item']) || ($_GET['item'] >= count($articles)))) {
            call('error', 'error');
        }
        else {
            $article = Article::find($_GET['item']);
            require_once('views/articles/show.php');
        }
    }
}
?>