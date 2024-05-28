<?php

    //Mapear la URL en el navegador
    class Core{
        protected $controladorActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        //Constructor
        public function __construct(){
            $url = $this->getUrl();

            //Buscar en la carpeta controladores si el controlador existe
            if (!empty($url) && file_exists('../app/controladores/' . ucwords($url[0]) . '.php')){
                //Si existe se configura como controlador por defecto
                $this->controladorActual = ucwords($url[0]);

                unset($url[0]);
            }

            //Requerir el controlador
            require_once '../app/controladores/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            //Chequear la segunda parte de la url (Método)
            if (isset($url[1])){
                if (method_exists($this->controladorActual, $url[1])) {
                    //Chequear el método
                    $this->metodoActual = $url[1];

                    unset($url[1]);
                }
            }

            //Traer los parametros
            $this->parametros = $url ? array_values($url) : [];

            //Llamar callback con parametros del array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }

        public function getUrl(){
            if (isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);

                return $url;
            }
        }
    }

?>