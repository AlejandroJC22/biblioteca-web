<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/viewLibros.css">
    <title><?php echo NOMBRE_SITIO ?></title>
</head>
<body>
    <?php require RUTA_APP . '/vistas/inc/header.php'; ?>

    <main>
        <aside>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($datos['portada']); ?>" alt=""> 
            <button onclick="location.href='<?php echo RUTA_URL; ?>/paginas/editarLibro/<?php echo $datos['id'] ?>'">Editar</button>
            <button class="delete" onclick="confirmDelete('<?php echo RUTA_URL; ?>/paginas/borrarLibro/<?php echo $datos['id'] ?>')">Borrar</button>              
        </aside>
        <div class="container">
            <h1 class="titulo"><?php echo $datos['titulo'];  ?></h1>
            <div class="responsive">
                <img class="hide" src="data:image/jpeg;base64,<?php echo base64_encode($datos['portada']); ?>" alt=""> 
                <div class="hide button-container">
                    <button class="buttom hide" onclick="location.href='<?php echo RUTA_URL; ?>/paginas/editarLibro/<?php echo $datos['id'] ?>'">Editar</button>
                    <button class="buttom borrar hide" onclick="confirmDelete('<?php echo RUTA_URL; ?>/paginas/borrarLibro/<?php echo $datos['id'] ?>')">Borrar</button>
                </div>
                
            </div>
            <h3 class="resumen"> Resumen </h3>
            <p class="descripcion"><?php echo $datos['descripcion']; ?></p>
            <h3 class="info">Información del libro</h3>
            <p class="autor"><strong>Autor:</strong> <?php echo $datos['autor']; ?></p>
            <p class="cantidad"><strong>Cantidad:</strong> <?php echo $datos['cantidad']; ?></p>
            <p class="estado"><strong>Estado:</strong> <?php echo $datos['estado']; ?></p> 
            
            <button onclick="location.href='<?php echo RUTA_URL; ?>/paginas/libros'">Volver</button>
            
        </div>
    </main>
</body>
</html>

<script>
function confirmDelete(url) {
    if (confirm('¿Estás seguro de que deseas eliminar este libro?')) {
        window.location.href = url; 
    }
}
</script>