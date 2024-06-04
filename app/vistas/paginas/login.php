<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/login.css">
    <title><?php echo NOMBRE_SITIO ?></title>
</head>
<body>
    <div class="container">
        <form action="<?php echo RUTA_URL; ?>/paginas/login" method="POST" class="formulario">
            <img class="logo" src="<?php echo RUTA_URL;?>/img/logo.jpg" alt="">
            <h3>Iniciar Sesión</h3>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="clave" placeholder="Contraseña" required>
            <?php if (!empty($datos['error'])): ?>
                <p class="error"><?php echo $datos['error']; ?></p>
            <?php endif; ?>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
