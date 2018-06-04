<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 4/6/18
 * Time: 20:35
 */

/**
 * Class UserType
 * Representa un tipo de usuario del sistema
 */

class UserType
{
    public $id;
    public $nombre;

    /**
     * UserType constructor.
     * @param $id
     * @param $nombre
     */
    public function __construct($id, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public static function all() {
        $list = [];
        $db = ConexionDB::getInstance();
        $result = $db->query('SELECT * FROM tipo_usuario');

        foreach($result->fetchAll() as $tipo) {
            $list[] = new UserType($tipo['id'], $tipo['nombre']);
        }

        return $list;
    }
}
