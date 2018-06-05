<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 18/4/18
 * Time: 20:25
 */

/**
 * Class Comment
 * Representa un comentario, parte de un articulo
 */

class Comment
{
    // Atributos del comentario
    public $id_comentario;
    public $nombre;
    public $year;
    public $month;
    public $day;
    public $hora;
    public $contenido;
    public $email;
    public $imagen;
    public $id_articulo;

    /**
     * Comment constructor.
     * @param $id
     * @param $nombre
     * @param $fecha
     * @param $hora
     * @param $contenido
     * @param $email
     * @param $imagen
     * @param $id_articulo
     */
    public function __construct($id, $nombre, $fecha, $hora, $contenido, $email, $imagen, $id_articulo)
    {
        $this->id_comentario = $id;
        $this->nombre = $nombre;
        $fecha = explode("-", $fecha);
        $this->year = $fecha[0];
        $this->month = $fecha[1];
        $this->day = $fecha[2];
        $this->hora = $hora;
        $this->contenido = $contenido;
        $this->email = $email;
        $this->imagen = $imagen;
        $this->id_articulo = $id_articulo;
    }

    public static function all() {
        $list = [];
        $db = ConexionDB::getInstance();
        $result = $db->query('SELECT * FROM comentarios');

        foreach($result->fetchAll() as $comment) {
            $list[] = new Comment($comment['id'], $comment['nombre'], $comment['fecha'], $comment['hora'],
                $comment['contenido'], $comment['email'], $comment['imagen'], $comment['id_articulo']);
        }

        return $list;
    }

    public static function find($article) {
        $db = ConexionDB::getInstance();
        $list = [];
        $result = $db->query('SELECT * FROM comentarios WHERE id_articulo = ' . $article);

        foreach($result->fetchAll() as $comment) {
            $list[] = new Comment($comment['id'], $comment['nombre'], $comment['fecha'], $comment['hora'],
                $comment['contenido'], $comment['email'], $comment['imagen'], $comment['id_articulo']);
        }

        return $list;
    }

    public static function addNew($nombre, $fecha, $hora, $contenido, $email, $imagen, $id_articulo) {
        $db = ConexionDB::getInstance();

        $stmt = $db->prepare("INSERT INTO comentarios (id, nombre, fecha, hora, contenido, email, imagen, id_articulo) 
              VALUES (NULL, :nombre, :fecha, :hora, :contenido, :email, :imagen, :id_articulo)");

        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':fecha',$fecha);
        $stmt->bindParam(':hora',$hora);
        $stmt->bindParam(':contenido',$contenido);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':imagen',$imagen);
        $stmt->bindParam(':id_articulo',$id_articulo);

        $success = $stmt->execute();

        return $success;
    }

    public static function modifyById($comment_id, $content) {
        $db = ConexionDB::getInstance();
        $stmt = $db->prepare("UPDATE comentarios SET contenido = :content WHERE comentarios.id = :comment_id");
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':comment_id', $comment_id);
        $success = $stmt->execute();
        return $success;
    }

    public static function deleteById($comment_id) {
        $db = ConexionDB::getInstance();
        $stmt = $db->prepare("DELETE FROM comentarios WHERE comentarios.id = :comment_id");
        $stmt->bindParam(':comment_id', $comment_id);
        $success = $stmt->execute();
        return $success;
    }

    // Obtiene la fecha en un formato mas legible
    public function getDate() {
        $MONTH_NAMES = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre",
            "octubre", "noviembre", "diciembre"];
        $dateString = $this->day . " de " . $MONTH_NAMES[$this->month - 1] . " de " . $this->year;
        return $dateString;
    }

    public function formatTime() {
        $formattedTime = "";

        for ($i = 0; $i <= strlen($this->hora) - 4; $i++) {
            $formattedTime .= $this->hora[$i];
        }

        return $formattedTime;
    }
}