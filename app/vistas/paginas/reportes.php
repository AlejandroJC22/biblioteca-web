<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/reportes.css">
    <link rel="stylesheet" type="text/js" href="<?php echo RUTA_URL; ?>/ls/inicio.js">
    <script>
        function generarReporte() {
            window.open('<?php echo RUTA_URL; ?>/paginas/generarReporte', '_blank');
        }
    </script>
</head>
<body>
<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
    <div> 
        <main>
            <h1>Reportes</h1><br>
            <p>Para generar reporte, haga click en el siguiente botón</p><br>
            <br>
            <button class="boton-generar" onclick="generarReporte()">Generar reporte</button>
        </main>
    </div>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
</body>
</html>

