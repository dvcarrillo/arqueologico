<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 26/4/18
 * Time: 19:22
 */

class ArticleController
{
    public $alertMsg = "";

    public function __construct() {
        require_once('models/article.php');
        require_once('models/comment.php');
    }

    public function index() {
        if(isset($_GET['action'])) {
            $this->processActions();
        }

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

    // Mejora: comprobar si existe algun articulo con el indice dado
    public function show() {
        if(isset($_GET['action'])) {
            $this->processActions();
        }

        // An URL is expected of form ?option=article&id=XX
        // without an ID, it redirects to the error page
        $articles = Article::all();
        $comments = Comment::all();

        if (!(Article::exists($_GET['item']))) {
            require_once('views/pages/error.php');
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
            case 'new-article':
                $success = $this->publishNewArticle();
                if(!$success)
                    $this->alertMsg = "Error al publicar el artículo";
                break;
            case 'edit-article':
                $success = $this->editArticle();
                if(!$success)
                    $this->alertMsg = "Error al editar el artículo";
                break;
            case 'delete-article':
                $success = $this->deleteArticle();
                if(!$success)
                    $this->alertMsg = "Error al eliminar el artículo";
                break;
            case 'new-comment':
                $success = $this->publishNewComment();
                if(!$success)
                    $this->alertMsg = "Error al publicar el comentario";
                break;
            case 'edit':
                $success = $this->modifyComment();
                if(!$success)
                    $this->alertMsg = "Error al editar el comentario";
                break;
            case 'delete':
                $success = $this->deleteComment();
                if(!$success)
                    $this->alertMsg = "Error al eliminar el comentario";
                break;
        }
    }

    private function publishNewArticle() {
        if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] == 'registrado') || ($_SESSION['user_type'] == 'moderador')) {
            return false;
        }

        date_default_timezone_set('Europe/Madrid');
        $today = getdate();
        $day = $today['mday'];
        $month = $today['mon'];
        $year = $today['year'];

        $titulo = $_POST['title'];
        $subtitulo = $_POST['subtitle'];
        $fecha = $year . "-" . $month . "-" . $day;
        $contenido = $_POST['content'];
        $imagen_principal = $_POST['main-image'];
        $imagenes = $_POST['article-images'];
        $pie_imagen = $_POST['footer-image'];

        $success = Article::addNew($titulo, $subtitulo, $fecha, $contenido, $imagen_principal, $imagenes, $pie_imagen);

        $this->alertMsg = "Nuevo artículo publicado correctamente";
        return $success;
    }

    private function editArticle() {
        if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] == 'registrado') || ($_SESSION['user_type'] == 'moderador')) {
            return false;
        }

        $target = $_GET['item'];

        $titulo = $_POST['title'];
        $subtitulo = $_POST['subtitle'];
        $contenido = $_POST['content'];
        $imagen_principal = $_POST['main-image'];
        $imagenes = $_POST['article-images'];
        $pie_imagen = $_POST['footer-image'];

        $success = Article::modifyById($target, $titulo, $subtitulo, $contenido, $imagen_principal, $imagenes, $pie_imagen);

        $this->alertMsg = "Artículo editado correctamente";
        return $success;
    }

    private function deleteArticle() {
        if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] == 'registrado') || ($_SESSION['user_type'] == 'moderador')) {
            return false;
        }

        $target = $_GET['id'];

        $success = Article::deleteById($target);

        $this->alertMsg = "Artículo eliminado correctamente";
        return $success;
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

        $this->alertMsg = "Tu comentario se ha publicado";
        return $success;
    }

    private function deleteComment() {
        if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] == 'registrado')) {
            return false;
        }

        $comment_id = $_GET['comment_id'];

        $success = Comment::deleteById($comment_id);

        $this->alertMsg = "Comentario eliminado correctamente";
        return $success;
    }

    private function modifyComment() {
        if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] == 'registrado')) {
            return false;
        }

        $comment_id = $_GET['comment_id'];
        $content = $_POST['comment'];

        $content .= '<br><br><span style="color:grey; font-style: italic">Comentario editado por moderador</span>';

        $success = Comment::modifyById($comment_id, $content);

        $this->alertMsg = "Comentario modificado correctamente";
        return $success;
    }
}
