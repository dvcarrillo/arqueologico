<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 18/4/18
 * Time: 20:04
 */

/**
 * Class Article
 * Representa un articulo presente en la pagina web
 */

class Article
{
    // Atributos del articulo
    public $id;
    public $titulo;
    public $subtitulo;
    public $year;
    public $month;
    public $day;
    public $contenido;
    public $imagen_principal;
    public $imagenes;
    public $pie_imagen;

    /**
     * Article constructor.
     * @param $id
     * @param $titulo
     * @param $subtitulo
     * @param $fecha
     * @param $contenido
     * @param $imagen_principal
     * @param $imagenes
     * @param $pie_imagen
     */
    public function __construct($id, $titulo, $subtitulo, $fecha, $contenido, $imagen_principal, $imagenes, $pie_imagen)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $fecha = explode("-", $fecha);
        $this->year = $fecha[0];
        $this->month = $fecha[1];
        $this->day = $fecha[2];
        $this->contenido = $contenido;
        $this->imagen_principal = $imagen_principal;
        $this->imagenes = explode(" ", $imagenes);
        $this->pie_imagen = $pie_imagen;
    }

    public static function all() {
        $list = [];
        $db = ConexionDB::getInstance();
        $result = $db->query('SELECT * FROM articulos');

        foreach($result->fetchAll() as $article) {
            $list[] = new Article($article['id'], $article['titulo'], $article['subtitulo'], $article['fecha'],
                $article['contenido'], $article['imagen_principal'], $article['imagenes'], $article['pie_imagen']);
        }

        return $list;
    }

    public static function find($id) {
        $db = ConexionDB::getInstance();
        // Check that id is integer
        $id = intval($id);
        $result = $db->prepare('SELECT * FROM articulos WHERE id = :id');

        $result->execute(array('id' => $id));
        $article = $result->fetch();

        return new Article($article['id'], $article['titulo'], $article['subtitulo'], $article['fecha'],
            $article['contenido'], $article['imagen_principal'], $article['imagenes'], $article['pie_imagen']);
    }

    public static function addNew($titulo, $subtitulo, $fecha, $contenido, $imagen_principal, $imagenes, $pie_imagen) {
        $db = ConexionDB::getInstance();

        $stmt = $db->prepare("INSERT INTO articulos (id, titulo, subtitulo, fecha, contenido, imagen_principal, imagenes, pie_imagen) 
              VALUES (NULL, :titulo, :subtitulo, :fecha, :contenido, :imagen_principal, :imagenes, :pie_imagen)");

        $stmt->bindParam(':titulo',$titulo);
        $stmt->bindParam(':subtitulo',$subtitulo);
        $stmt->bindParam(':fecha',$fecha);
        $stmt->bindParam(':contenido',$contenido);
        $stmt->bindParam(':imagen_principal',$imagen_principal);
        $stmt->bindParam(':imagenes',$imagenes);
        $stmt->bindParam(':pie_imagen',$pie_imagen);

        $success = $stmt->execute();

        return $success;
    }
}
?>