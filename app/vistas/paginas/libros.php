<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/libros.css">
    <link rel="stylesheet" type="text/js" href="<?php echo RUTA_URL; ?>/ls/inicio.js">
    <title></title>
</head>
<body>
<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
    <div class="header">
        <h1>Libros Disponibles</h1>
        <a href="<?php echo RUTA_URL; ?>/paginas/agregarLibro"><button class="boton-agregar">Nuevo Libro</button></a>
    </div>
    
    <main>
        <?php 
            foreach ($datos['libros'] as $libro):
                
        ?>
        <a class="card" href="<?php echo RUTA_URL;?>/paginas/viewLibros/<?php echo $libro->id;?>">
            
            <div class="image"><img src="data:image/jpeg;base64,<?php echo base64_encode($libro->portada); ?>" alt="Portada Libro"></div>
            
            <div class="caption">
                <p class="titulo"><strong>Titulo:</strong> <?php echo $libro->titulo; ?></p>
                <p class="autor"><strong>Autor:</strong> <?php echo $libro->autor; ?></p>
                <p class="cantidad"><strong>Cantidad:</strong> <?php echo $libro->cantidad; ?></p>
                <p class="estado"><strong>Estado:</strong> <?php echo $libro->estado; ?></p> 
            </div>
        </a>
        <?php endforeach; ?>
    </main>

    <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

</body>
</html>

