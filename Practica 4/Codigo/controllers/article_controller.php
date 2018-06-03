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

    public function print_article() {
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

    public function show() {
        if(isset($_GET['action'])) {
            $this->processActions();
        }

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

    private function processActions() {
        $action = $_GET['action'];
        switch ($action) {
            case 'new-comment':
                $success = $this->publishNewComment();
                if(!$success)
                    echo("Error al publicar el comentario");
                break;
            case 'edit':
                $success = $this->modifyComment();
                if(!$success)
                    echo("Error al modificar el comentario");
                break;
            case 'delete':
                $success = $this->deleteComment();
                if(!$success)
                    echo("Error al eliminar el comentario");
                break;
        }
    }

    private function publishNewComment() {
        date_default_timezone_set('Europe/Madrid');
        $today = getdate();
        $hours = $today['hours'];
        $minutes = $today['minutes'];
        $day = $today['mday'];
        $month = $today['mon'];
        $year = $today['year'];

        $nombre = $_SESSION['user_name'];
        $fecha = $year . "-" . $month . "-" . $day;
        $hora = $hours . ":" . $minutes;
        $contenido = $_POST['comment'];
        $email = $_SESSION['user_email'];
        $imagen = $_SESSION['user_avatar'];
        $id_articulo = $_GET['item'];

        $success = Comment::addNew($nombre, $fecha, $hora, $contenido, $email, $imagen, $id_articulo);

        return $success;
    }

    private function deleteComment() {
        $comment_id = $_GET['comment_id'];

        if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] == 'registrado')) {
            return false;
        }

        $success = Comment::deleteById($comment_id);
        return $success;
    }

    private function modifyComment() {
        $comment_id = $_GET['comment_id'];
        $content = $_POST['comment'];

        $content .= '<br><br><span style="color:grey; font-style: italic">Comentario editado por moderador</span>';

        if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] == 'registrado')) {
            return false;
        }

        $success = Comment::modifyById($comment_id, $content);
        return $success;
    }
}
