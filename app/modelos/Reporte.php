<?php 

    class Reporte{

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function obtenerReporteLibros(){
            $this->db->query("SELECT * from libros");
            return $this->db->registros();
        }

        public function obtenerReportePrestamos(){
            $this->db->query("SELECT * from prestamos");
            return $this->db->registros();
        }
    }

?>