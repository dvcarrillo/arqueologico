<?php
/**
 * Created by PhpStorm.
 * User: dvcarrillo
 * Date: 13/5/18
 * Time: 20:57
 */

/**
 * Class User
 * Representa un usuario del sistema
 */

class User
{
    // Atributos del usuario
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $clave;
    public $tipo;
    public $avatar;

    /**
     * User constructor.
     * @param $id
     * @param $nombre
     * @param $apellidos
     * @param $email
     * @param $clave
     * @param $tipo
     * @param $avatar
     */
    public function __construct($id, $nombre, $apellidos, $email, $clave, $tipo, $avatar)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->clave = $clave;
        $this->tipo = $tipo;
        $this->avatar = $avatar;
    }


    public static function all() {
        $list = [];
        $db = ConexionDB::getInstance();
        $result = $db->query('SELECT * FROM usuarios');

        foreach($result->fetchAll() as $usuario) {
            $list[] = new User($usuario['id'], $usuario['nombre'], $usuario['apellidos'], $usuario['email'],
                $usuario['clave'], $usuario['tipo'], $usuario['avatar']);
        }

        return $list;
    }

    public static function find($email, $clave) {
        $db = ConexionDB::getInstance();

        $result = $db->prepare('SELECT * FROM usuarios WHERE email = :email AND clave = :clave');

        $result->execute(array('email' => $email, 'clave' => $clave));
        $usuario = $result->fetch();

        if($usuario) {
            return new User($usuario['id'], $usuario['nombre'], $usuario['apellidos'], $usuario['email'],
                $usuario['clave'], $usuario['tipo'], $usuario['avatar']);
        }
        else {
            return null;
        }
    }

}