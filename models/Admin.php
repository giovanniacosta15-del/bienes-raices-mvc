<?php

namespace Model;

class Admin extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = strtolower(trim($args['email'] ?? ''));
        $this->password = $args['password'] ?? '';
    }

    public function validar() {
        self::$errores = [];

        if(!$this->email) {
            self::$errores[] = 'El email es obligatorio';
        }

        if(!$this->password) {
            self::$errores[] = 'El password es obligatorio';
        }

        return self::$errores;
    }

    public function existeUsuario() {
        // Revisar si un usuario existe o no
        $email = self::$db->escape_string($this->email);
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if(!$resultado || !$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe';
            return;
        }
        return $resultado;
     }

     public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado && hash_equals($usuario->password, $this->password)) {
            $autenticado = true;
            $this->actualizarPasswordLegacy($usuario->id);
        }

        if(!$autenticado) {
            self::$errores[] = 'El password es incorrecto';
        }

        return $autenticado;
     }

     private function actualizarPasswordLegacy($id) {
        $id = self::$db->escape_string($id);
        $passwordHash = self::$db->escape_string(password_hash($this->password, PASSWORD_BCRYPT));

        $query = "UPDATE " . self::$tabla . " SET password = '{$passwordHash}' WHERE id = '{$id}' LIMIT 1";
        self::$db->query($query);
     }

     public function autenticar() {
        session_start();

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
        exit;
     }
}
