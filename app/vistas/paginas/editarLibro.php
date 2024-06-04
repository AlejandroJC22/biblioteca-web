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
        <h1 style="padding: 15px;">Editar Libro</h1>
        <form action="<?php echo RUTA_URL?>/paginas/editarLibro/<?php echo $datos['id']; ?>" method="POST" class="formulario" id="edicionLibro" enctype="multipart/form-data">

            <label for="portada">Portada: </label>
            <input type="file" name="imageUpload" id="imageUpload" accept="image/*" value="<?php echo base64_encode($datos['portada']);  ?>">

            <label for="titulo">Titulo del libro: </label>
            <input type="text" name="titulo" require value="<?php echo $datos['titulo'];  ?>">
                        
            <label for="autor">Nombre del autor: </label>
            <input type="text" name="autor" require value="<?php echo $datos['autor'];  ?>"><br>

            <label for="descripcion">Descripción del libro: </label>
            <input type="text" name="descripcion" require value="<?php echo $datos['descripcion'];  ?>"><br>

            <label for="cantidad">Cantidad de libros: </label>
            <input type="number" name="cantidad" require value="<?php echo $datos['cantidad'];  ?>"><br>

            <label for="estado">Estado: </label>  
            <select name="estado" class="estado">
                <option value="<?php echo $datos['estado'];  ?>"><?php echo $datos['estado'];  ?></option>
                <option value="Activo" selected>Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>

            <input type="submit" value="Enviar" class="boton-enivar" name="enviar">

            <a href="<?php echo RUTA_URL ?>/paginas/libros">Cancelar</a>    
        </form>
    </div>

    <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
</body>
</html>