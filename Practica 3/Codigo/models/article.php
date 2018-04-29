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
    private $id_articulo;
    private $titulo;
    private $subtitulo;
    private $fecha;
    private $contenido;
    private $imagen_principal;
    private $imagenes;
    private $pie_imagen;

    /**
     * Article constructor.
     * @param $id_articulo
     * @param $titulo
     * @param $subtitulo
     * @param $fecha
     * @param $contenido
     * @param $imagen_principal
     * @param $imagenes
     * @param $pie_imagen
     */
    public function __construct($id_articulo, $titulo, $subtitulo, $fecha, $contenido, $imagen_principal, $imagenes, $pie_imagen)
    {
        $this->id_articulo = $id_articulo;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->fecha = $fecha;
        $this->contenido = $contenido;
        $this->imagen_principal = $imagen_principal;
        $this->imagenes = $imagenes;
        $this->pie_imagen = $pie_imagen;
    }

    /**** GET AND SET METHODS ****/

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id_articulo;
    }

    /**
     * @param mixed $id_articulo
     */
    public function setId($id_articulo)
    {
        $this->id_articulo = $id_articulo;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    /**
     * @param mixed $subtitulo
     */
    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * @param mixed $contenido
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * @return mixed
     */
    public function getImagenPrincipal()
    {
        return $this->imagen_principal;
    }

    /**
     * @param mixed $imagen_principal
     */
    public function setImagenPrincipal($imagen_principal)
    {
        $this->imagen_principal = $imagen_principal;
    }

    /**
     * @return mixed
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * @param mixed $imagenes
     */
    public function setImagenes($imagenes)
    {
        $this->imagenes = $imagenes;
    }

    /**
     * @return mixed
     */
    public function getPieImagen()
    {
        return $this->pie_imagen;
    }

    /**
     * @param mixed $pie_imagen
     */
    public function setPieImagen($pie_imagen)
    {
        $this->pie_imagen = $pie_imagen;
    }

}