<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 26/4/18
 * Time: 19:22
 */

class ArticleController
{

    public function __construct(){
        require_once('/opt/lampp/htdocs/dashboard/models/article.php');
    }

    public function index() {
        //require_once()
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
        //echo(implode(" ",$_GET));
        if (!isset($_GET['id'])){
            /*return */call('error', 'error');
        }
        else{
            require_once('/opt/lampp/htdocs/dashboard/models/article.php');

            $article = Article::find($_GET['id']);
            require_once('/opt/lampp/htdocs/dashboard/views/articles/show.php');
        }    


    }
}
?>