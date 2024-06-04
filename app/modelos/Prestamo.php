<?php 

    class Prestamo{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function obtenerPrestamos(){
            $this->db->query("SELECT * from prestamos");
            return $this->db->registros();
        }

        public function nuevoPrestamo($datos) {
            $this->db->query("INSERT INTO prestamos(estudiante,libro,cantidad,fechaPrestamo,fechaDevolucion,estado)
            VALUES (:estudiante, :libro, :cantidad, :fechaPrestamo, :fechaDevolucion, :estado)");

            $this->db->bind(':estudiante',$datos['estudiante']);
            $this->db->bind(':libro',$datos['libro']);
            $this->db->bind(':cantidad',$datos['cantidad']);
            $this->db->bind(':fechaPrestamo',$datos['fechaPrestamo']);
            $this->db->bind(':fechaDevolucion',$datos['fechaDevolucion']);
            $this->db->bind(':estado',$datos['estado']);

            if ($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerPrestamoId($id){
            $this->db->query("SELECT * from prestamos WHERE id = :id");
            $this->db->bind(':id', $id);
            $fila = $this->db->registros();

            return $fila;
        }

        public function actualizarPrestamo($datos){
            $this->db->query('UPDATE prestamos SET estudiante = :estudiante, libro = :libro, cantidad = :cantidad, fechaPrestamo = :fechaPrestamo, fechaDevolucion = :fechaDevolucion, estado = :estado WHERE id = :id');
                    
            $this->db->bind(':estudiante', $datos['estudiante']);
            $this->db->bind(':libro', $datos['libro']);
            $this->db->bind(':cantidad', $datos['cantidad']);
            $this->db->bind(':fechaPrestamo', $datos['fechaPrestamo']);
            $this->db->bind(':fechaDevolucion', $datos['fechaDevolucion']);
            $this->db->bind(':estado', $datos['estado']);
            $this->db->bind(':id', $datos['id']); // Agregar esta línea para el ID
        
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function eliminarPrestamo($id) {
            $this->db->query('DELETE FROM prestamos WHERE id = :id');
            $this->db->bind(':id', $id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        
    }

?>
