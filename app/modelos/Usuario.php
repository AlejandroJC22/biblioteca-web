<?php 

    class Usuario{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
    
        public function obtenerLogin($usuario) {
            $this->db->query("SELECT * FROM usuarios WHERE usuario = :usuario");
            $this->db->bind(':usuario', $usuario);
            return $this->db->registro();
        }
    }

?>