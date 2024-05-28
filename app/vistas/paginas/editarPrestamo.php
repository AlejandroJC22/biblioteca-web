<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/agregar.css">
    <title><?php NOMBRE_SITIO ?></title>
</head>
<body>
    <?php require RUTA_APP . '/vistas/inc/header.php'; ?>

    <div>
        <h1 style="padding: 20px;">Editar Prestamo</h1>
        <form action="<?php echo RUTA_URL?>/paginas/editarPrestamo/<?php echo $datos['id']; ?>" method="POST" class="formulario" id="validacionFormulario">
                <label for="estudiante">Nombre del Estudiante: </label>
                <input type="text" name="estudiante" value="<?php echo $datos['estudiante'];  ?>"><br>

                <label for="libro">Nombre del Libro: </label>
                <select name="libro" id="nombreLibro">
                    <option value="<?php echo $datos['libro'];  ?>"><?php echo $datos['libro'];?></option>
                </select><br>
                        
                <label for="cantidad">Cantidad de libros: </label>
                <input type="number" name="cantidad" value="<?php echo $datos['cantidad'];?>"><br>
                
                <label for="fecha">Fecha de préstamo: </label>
                <input type="date" name="fechaPrestamo" id="fecha-prestamo-input" min="" value="<?php echo $datos['fechaPrestamo'];?>">

                <label for="fecha">Fecha de devolución: </label>
                <input type="date" name="fechaDevolucion" id="fecha-devolucion-input" min="" value="<?php echo $datos['fechaDevolucion'];?>">

                <label for="estado">Estado: </label>          
                <select name="estado" class="estado">
                    <option value="<?php echo $datos['estado'];?>"><?php echo $datos['estado'];?></option>
                    <option value="Prestado">Prestado</option>
                    <option value="Devuelto">Devuelto</option>
                </select>

                <input type="submit" value="Guardar Cambios" class="boton-enivar" name="enviar">

                <a href="<?php echo RUTA_URL ?>/paginas/prestamos">Cancelar</a>    
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="validacion.js"></script>

    <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
</body>
</html>