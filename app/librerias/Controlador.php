<?php

    //Crear clase controlador principal (carga los modelos y las vistas)
    class Controlador{
        //Cargar modelo
        public function modelo($modelo){
            require_once '../app/modelos/' . $modelo . '.php';
            //Instanciar el modelo
            return new $modelo();
        }
        public function vista($vista, $datos = []){
            //Chequear si el archivo vista existe
            if (file_exists('../app/vistas/' . $vista . '.php')){
                require_once '../app/vistas/' . $vista . '.php';
            }else{
                //Mostrar error si no existe el archivo en vistas
                die('La vista '. $vista . ' no existe');
            }

        }
    }

?>