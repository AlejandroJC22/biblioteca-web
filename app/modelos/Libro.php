<?php

    class Libro{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function obtenerLibros(){
            $this->db->query("SELECT * from libros");

            return $this->db->registros();
        }

        public function agregarLibros($datos) {
            $this->db->query("INSERT into libros(portada, titulo, autor, descripcion, cantidad, estado)
            values(:portada, :titulo, :autor, :descripcion, :cantidad, :estado)");
            
            $this->db->bind(':portada',$datos['portada']);
            $this->db->bind(':titulo',$datos['titulo']);
            $this->db->bind(':autor',$datos['autor']);
            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->bind(':cantidad',$datos['cantidad']);
            $this->db->bind(':estado',$datos['estado']);

            if ($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerLibroId($id){
            $this->db->query("SELECT * from libros WHERE id = :id");
            $this->db->bind(':id', $id);
            $fila = $this->db->registros();

            return $fila;
        }

        public function actualizarLibro($datos){
            $this->db->query('UPDATE libros SET portada = :portada, titulo = :titulo, autor = :autor, descripcion = :descripcion, cantidad = :cantidad, estado = :estado WHERE id = :id');
                    
            $this->db->bind(':portada', $datos['portada']);
            $this->db->bind(':titulo', $datos['titulo']);
            $this->db->bind(':autor', $datos['autor']);
            $this->db->bind(':descripcion', $datos['descripcion']);
            $this->db->bind(':cantidad', $datos['cantidad']);
            $this->db->bind(':estado', $datos['estado']);
            $this->db->bind(':id', $datos['id']);
        
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }

?>