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
        <h1 style="padding: 20px;">Agregar Nuevo Prestamo</h1>
        <form action="<?php echo RUTA_URL?>/paginas/agregarPrestamo" method="POST" class="formulario" id="formularioPrestamo">
                <label for="estudiante">Nombre del Estudiante: </label>
                <input type="text" name="estudiante" required><br>

                <label for="libro">Nombre del Libro: </label>
                <select name="libro" id="nombreLibro" required>
                    <option value="">Selecciona una opción</option>
                    <?php foreach($datos['libro'] as $libro): ?>
                        <?php if ($libro->estado == 'Activo'): ?>
                            <option value="<?php echo $libro->titulo; ?>"><?php echo $libro->titulo; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select><br>
                        
                <label for="cantidad">Cantidad de libros: </label>
                <input type="number" name="cantidad" required><br>
                
                <label for="fecha">Fecha de préstamo: </label>
                <input type="date" name="fechaPrestamo" min="" required>

                <label for="fecha">Fecha de devolución: </label>
                <input type="date" name="fechaDevolucion" min="" required>

                <label for="estado">Estado: </label>          
                <select name="estado" class="estado" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Prestado">Prestado</option>
                    <option value="Devuelto">Devuelto</option>
                </select>

                <input type="submit" value="Enviar" class="boton-enivar" name="enviar">

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



<script>
    $(document).ready(function() {
    $("#validacionFormulario").validate({
        rules: {
            titulo: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            autor: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            descripcion: {
                required: true,
                minlength: 10
            },
            cantidad: {
                required: true,
                min: 1
            },
            estado: {
                required: true,
                notEqualTo: ""
            }
        },
        messages: {
            titulo: {
                required: "*Por favor introduce el título del libro",
                minlength: "*El título debe contener al menos 3 caracteres",
                maxlength: "*El título contiene demasiados caracteres"
            },
            autor: {
                required: "*Por favor introduce el nombre del autor",
                minlength: "*El nombre debe contener al menos 3 caracteres",
                maxlength: "*El nombre contiene demasiados caracteres"
            },
            descripcion: {
                required: "*Por favor escribe la descripción del libro",
                minlength: "*La descripción debe contener al menos 10 caracteres"
            },
            cantidad: {
                required: "*Por favor escribe la cantidad",
                min: "*La cantidad debe ser mayor a 0"
            },
            estado: {
                required: "*Por favor selecciona un estado",
                notEqualTo: "*Por favor selecciona una opción válida"
            }
        }
    });
});
</script>