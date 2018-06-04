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

    public static function exists($email) {
        $db = ConexionDB::getInstance();
        $exists = false;

        $result = $db->prepare('SELECT * FROM usuarios WHERE email = :email');

        $result->execute(array('email' => $email));
        $usuario = $result->fetch();

        if($usuario)
            $exists = true;

        return $exists;
    }

    public static function addUser($name, $surname, $email, $password, $type, $avatar) {
        $db = ConexionDB::getInstance();

        $stmt = $db->prepare("INSERT INTO usuarios (id, nombre, apellidos, email, clave, tipo, avatar) 
              VALUES (NULL, :nombre, :apellidos, :email, :clave, :tipo, :avatar)");

        $stmt->bindParam(':nombre',$name);
        $stmt->bindParam(':apellidos',$surname);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':clave',$password);
        $stmt->bindParam(':tipo',$type);
        $stmt->bindParam(':avatar',$avatar);

        $success = $stmt->execute();

        return $success;
    }

    public function modifyData($name, $surname, $email, $password, $avatar) {
        $db = ConexionDB::getInstance();

        $stmt = $db->prepare("UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, email=:email, 
              clave=:clave, avatar=:avatar WHERE usuarios.id = :id");

        $stmt->bindParam(':nombre',$name);
        $stmt->bindParam(':apellidos',$surname);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':clave',$password);
        $stmt->bindParam(':avatar',$avatar);
        $stmt->bindParam(':id',$this->id);

        $success = $stmt->execute();

        return $success;
    }

    public function modifyPermissions($user_id, $type) {
        $db = ConexionDB::getInstance();

        $stmt = $db->prepare("UPDATE usuarios SET tipo=:type WHERE usuarios.id = :id");

        $stmt->bindParam(':type',$type);
        $stmt->bindParam(':id',$user_id);

        $success = $stmt->execute();

        return $success;
    }
}
