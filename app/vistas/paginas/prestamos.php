<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/prestamos.css">
    <title>Biblioteca Distrital</title>
</head>
<body>
<?php require RUTA_APP . '/vistas/inc/header.php'; ?>    
    <div class="header">
        <h1>Prestamos Realizados</h1>
        <a href="<?php echo RUTA_URL; ?>/paginas/agregarPrestamo"><button class="boton-agregar">Nuevo Prestamo</button></a>
    </div>
    <main>
        <table class="tabla-prestamo">
            <thead>
                <th>Estudiante</th>
                <th>Libro</th>
                <th>Cantidad</th>
                <th class="fechaPrestamo">Fecha Prestamo</th>
                <th class="fechaDevolucion">Fecha Devolucion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php foreach ($datos['prestamos'] as $prestamos): ?>
                    <tr>
                        <td><?php echo $prestamos->estudiante; ?></td>
                        <td><?php echo $prestamos->libro; ?></td>
                        <td><?php echo $prestamos->cantidad; ?></td>
                        <td class="fechaPrestamo"><?php echo $prestamos->fechaPrestamo; ?></td>
                        <td class="fechaDevolucion"><?php echo $prestamos->fechaDevolucion; ?></td>
                        <td><?php echo $prestamos->estado; ?></td>
                        <td>
                            <a href="<?php echo RUTA_URL;?>/paginas/editarPrestamo/<?php echo $prestamos->id;?>"><img class="img-t" src="<?php echo RUTA_URL;?>/img/editar-libro.jpg" alt="" title="Editar Libro"></a>
                            <a href="<?php echo RUTA_URL;?>/paginas/borrar/<?php echo $prestamos->id;?>"><img class="img-t" src="<?php echo RUTA_URL;?>/img/eliminar-libro.jpg" alt="" title="Borrar Libro"></a>
                        </td>
                    </tr>    
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
</body>
</html>