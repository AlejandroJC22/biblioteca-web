<?php 

    class Paginas extends CoreController{

        protected $usuarioModelo;
        protected $libroModelo;
        protected $prestamoModelo;
        protected $reporteModelo;

        public function __construct(){
            $this->usuarioModelo = $this->modelo('Usuario');
            $this->libroModelo = $this->modelo('Libro');
            $this->prestamoModelo = $this->modelo('Prestamo');
            $this->reporteModelo = $this->modelo('Reporte');
        }

        public function index(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $usuario = trim($_POST['usuario']);
                $clave = trim($_POST['clave']);
    
                // Validar credenciales
                $usuarioData = $this->usuarioModelo->obtenerLogin($usuario);
                if ($usuarioData && password_verify($clave, $usuarioData->clave)) {
                    // Configurar la sesión de usuario
                    session_start();
                    $_SESSION['id'] = $usuarioData->id;
                    $_SESSION['usuario'] = $usuarioData->nombre;
                    
                    redireccionar('/paginas/libros');
                } else {
                    // Mostrar mensaje de error
                    $datos = [
                        'error' => 'Usuario o contraseña incorrectos'
                    ];
                    $this->vista('/paginas/login', $datos);
                }
            } else {
                $datos = [
                    'error' => ''
                ];
                $this->vista('paginas/login', $datos);
            }
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
            // Redirige a la página de inicio de sesión
            redireccionar(RUTA_URL . '/paginas/login');
            exit;
        }

        public function libros(){
            $libros = $this->libroModelo->obtenerLibros();

            $datos =[
                'libros' => $libros
            ];
            $this->vista('paginas/libros', $datos);
        }

        public function prestamos() {
            $prestamos = $this->prestamoModelo->obtenerPrestamos();
            $datos = ['prestamos' => $prestamos];
            $this->vista('paginas/prestamos', $datos);
        }

        public function reportes() {
            $this->vista('paginas/reportes');
        }

        public function generarReporte() {
            $this->vista('paginas/generar-reporte');
        }

        public function agregarLibro(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Verificar si se ha subido una imagen
                if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] === UPLOAD_ERR_OK) {
                    // Obtener datos de la imagen
                    $imagen_binaria = file_get_contents($_FILES['imageUpload']['tmp_name']);
                    // Asignar los datos de la imagen al arreglo de datos
                    $_POST['portada'] = $imagen_binaria;
                }
                $datos = [
                    'portada' => isset($_POST['portada']) ? $_POST['portada'] : null,
                    'titulo' => trim($_POST['titulo']),
                    'autor' => trim($_POST['autor']),
                    'descripcion' => trim($_POST['descripcion']),
                    'cantidad' => trim($_POST['cantidad']),
                    'estado' => trim($_POST['estado']),
                ];

                if ($this->libroModelo->agregarLibros($datos)){
                    redireccionar('/paginas/libros');
                }else{
                    die('Algo salió mal');
                }

            }else{
                $datos = [
                    'titulo' => '',
                    'autor' => '',
                    'descripcion' => '',
                    'cantidad' => '',
                    'estado' => '', 
                ];

                $this->vista('paginas/agregarLibro', $datos);
            }
        } 

        public function editarLibro($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Verificar si se ha subido una imagen
                if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] === UPLOAD_ERR_OK) {
                    // Obtener datos de la imagen
                    $imagen_binaria = file_get_contents($_FILES['imageUpload']['tmp_name']);
                    // Asignar los datos de la imagen al arreglo de datos
                    $_POST['portada'] = $imagen_binaria;
                    $datos = [
                        'id' => $id,
                        'portada' => isset($_POST['portada']) ? $_POST['portada'] : null,
                        'titulo' => trim($_POST['titulo']),
                        'autor' => trim($_POST['autor']),
                        'descripcion' => trim($_POST['descripcion']),
                        'cantidad' => trim($_POST['cantidad']),
                        'estado' => trim($_POST['estado']),
                    ];
                }else{
                    $portadaExistente = $this->libroModelo->obtenerLibroId($id);
                    $datos = [
                        'id' => $id,
                        'portada' => $portadaExistente[0]->portada,
                        'titulo' => trim($_POST['titulo']),
                        'autor' => trim($_POST['autor']),
                        'descripcion' => trim($_POST['descripcion']),
                        'cantidad' => trim($_POST['cantidad']),
                        'estado' => trim($_POST['estado']),
                    ];
                }

                if ($this->libroModelo->actualizarLibro($datos)){
                    redireccionar('/paginas/libros');
                }else{
                    die('Algo salió mal');
                }

            }else{

                //obtener información usuario desde el modelo
                $libro = $this->libroModelo->obtenerLibroId($id);
                $datos = [
                    'id' => $libro[0]->id,
                    'portada' => $libro[0]->portada,
                    'titulo' => $libro[0]->titulo,
                    'autor' => $libro[0]->autor,
                    'descripcion' => $libro[0]->descripcion,
                    'cantidad' => $libro[0]->cantidad,
                    'estado' => $libro[0]->estado, 
                ];

                $this->vista('paginas/editarLibro', $datos);
            }
        } 
        
        public function agregarPrestamo(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datos = [
                    'estudiante' => trim($_POST['estudiante']),
                    'libro' => trim($_POST['libro']),
                    'cantidad' => trim($_POST['cantidad']),
                    'fechaPrestamo' => trim($_POST['fechaPrestamo']),
                    'fechaDevolucion' => trim($_POST['fechaDevolucion']),
                    'estado' => trim($_POST['estado']),
                ];

                if ($this->prestamoModelo->nuevoPrestamo($datos)){

                    // Restar la cantidad prestada del total de libros disponibles
                    $idLibro = $datos['libro'];
                    $cantidadPrestada = $datos['cantidad'];
                    $this->libroModelo->restarCantidadLibros($idLibro, $cantidadPrestada);

                    redireccionar('/paginas/prestamos');
                }else{
                    die('Algo salió mal');
                }

            }else{
                $libros = $this->libroModelo->obtenerLibros();
                $datos = [
                    'estudiante' => '',
                    'libro' => $libros,
                    'cantidad' => '',
                    'fechaPrestamo' => '',
                    'fechaDevolucion' => '',
                    'estado' => '', 
                ];

                $this->vista('paginas/agregarPrestamo', $datos);
            }
        }

        public function editarPrestamo($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $datos = [
                    'id' => $id,
                    'estudiante' => trim($_POST['estudiante']),
                    'libro' => trim($_POST['libro']),
                    'cantidad' => trim($_POST['cantidad']),
                    'fechaPrestamo' => trim($_POST['fechaPrestamo']),
                    'fechaDevolucion' => trim($_POST['fechaDevolucion']),
                    'estado' => trim($_POST['estado']),
                ];

                if ($this->prestamoModelo->actualizarPrestamo($datos)){
                    redireccionar('/paginas/prestamos');
                }else{
                    die('Algo salió mal');
                }

            }else{

                //obtener información usuario desde el modelo
                $prestamo = $this->prestamoModelo->obtenerPrestamoId($id);

                $datos = [
                    'id' => $prestamo[0]->id,
                    'estudiante' => $prestamo[0]->estudiante,
                    'libro' => $prestamo[0]->libro,
                    'cantidad' => $prestamo[0]->cantidad,
                    'fechaPrestamo' => $prestamo[0]->fechaPrestamo,
                    'fechaDevolucion' => $prestamo[0]->fechaDevolucion,
                    'estado' => $prestamo[0]->estado 
                ];

                $this->vista('paginas/editarPrestamo', $datos);
            }
        }

        public function viewLibros($id){

            $libro = $this->libroModelo->obtenerLibroId($id);

            $datos =[
                'id' => $libro[0]->id,
                'portada' => $libro[0]->portada,
                'titulo' => $libro[0]->titulo,
                'autor' => $libro[0]->autor,
                'descripcion' => $libro[0]->descripcion,
                'cantidad' => $libro[0]->cantidad,
                'estado' => $libro[0]->estado,
            ];

            $this->vista('paginas/viewLibros', $datos);
        }
    }

?>