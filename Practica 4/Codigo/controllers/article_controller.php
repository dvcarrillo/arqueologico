<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 26/4/18
 * Time: 19:22
 */

class ArticleController{

    public $mostrarComentar;
    public $mostrarEditarBorrarComentario;
    public $mostrarEditarArticulo;

    public function __construct() {
        $this->mostrarComentar=false;
        $this->mostrarEditarBorrarComentario=false;
        $this->mostrarEditarArticulo=false;
        require_once('models/article.php');
        require_once('models/comment.php');
    }

    public function index() {
        // Stores all information in a variable
        $articles = Article::all();
        require_once('views/articles/index.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }

    public function print() {
        // An URL is expected of form ?option=article&id=XX
        // without an ID, it redirects to the error page
        $articles = Article::all();
        $comments = Comment::all();

        if ((!isset($_GET['item']) || ($_GET['item'] >= count($articles)))) {
            call('error', 'error');
        }
        else {
            $article = Article::find($_GET['item']);
            $comment = Comment::find($article->id);
            require_once('views/articles/show.php');
        }
    }

    public function detectUserType(){
        if(isset($_SESSION['user_name'])){
            switch ($_SESSION['user_type']) {
                case 'registrado':
                    $this->mostrarComentar=true;
                    break;
                case 'moderador':
                    $this->mostrarComentar=true;
                    $this->mostrarEditarBorrarComentario=true;
                    break;
                case 'gestor':
                    $this->mostrarComentar=true;
                    $this->mostrarEditarBorrarComentario=true;
                    $this->mostrarEditarArticulo=true;
                    break;
                 case 'superusuario':
                    $this->mostrarComentar=true;
                    $this->mostrarEditarBorrarComentario=true;
                    $this->mostrarEditarArticulo=true;
                    break;    
            }
        }   
    }

    public function show() {
        // An URL is expected of form ?option=article&id=XX
        // without an ID, it redirects to the error page
        $articles = Article::all();
        $comments = Comment::all();

        if ((!isset($_GET['item']) || ($_GET['item'] >= count($articles)))) {
            call('error', 'error');
        }
        else {
            $article = Article::find($_GET['item']);
            $article->mostrarComentar=$this->mostrarComentar;
            $article->mostrarEditarBorrarComentario=$this->mostrarEditarBorrarComentario;
            $article->mostrarEditarArticulo=$this->mostrarEditarArticulo;
            $comment = Comment::find($article->id);
            require_once('views/articles/show.php');
        }
    }
}
?>