<?php

    //Clase para conectar la Base de Datos y ejecutar consultas
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $namebd = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            //Configurar la conexión
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->namebd;

            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Crear instancia de PDO
            try {

                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
                $this->dbh->exec('set names utf8');


            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }

        //Preparar y recibir la consulta sql
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        //Vinculación de la consulta con bind
        public function bind($parametro, $valor, $tipo = null){
            if (is_null($tipo)){
                switch (true) {
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                    break;
                    default:
                        $tipo = PDO::PARAM_STR;
                    break;
                }
            }

            $this->stmt->bindValue($parametro, $valor, $tipo);
        }

        //Ejecutar la consulta
        public function execute(){
            return $this->stmt->execute();
        }

        //Obtener registros de consulta
        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //Obtener un unico registro
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Obtener la cantidad de filas de la tabla en la base de datos
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }

?>


