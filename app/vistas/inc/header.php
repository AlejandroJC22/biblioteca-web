<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/header.css">
    <script type="text/javascript" src="<?php echo RUTA_URL ?>/js/header.js"></script>  
    <title><?php echo NOMBRE_SITIO ?></title>
</head>
<body>

    <nav>
        <ul class="sidebar">
            <li onclick="hideSidebar()"><a><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
            <li><a href="<?php echo RUTA_URL; ?>/paginas/libros">Todos los libros</a></li>
            <li><a href="<?php echo RUTA_URL; ?>/paginas/prestamos">Prestamos realizados</a></li>
            <li><a href="<?php echo RUTA_URL; ?>/paginas/reportes">Generar reporte</a></li>
            <li class="logout"><a style="color: red;" href="<?php echo RUTA_URL; ?>/paginas/cerrarSesion">Cerrar sesión</a></li>
        </ul>
        <ul class="menu">
            <li><a href="<?php echo RUTA_URL; ?>/paginas/libros"><img src="<?php echo RUTA_URL;?>/img/logo.png" alt="Logo Biblioteca" class="logo"></a></li>
            <li><a class="hideOnMobile" href="<?php echo RUTA_URL; ?>/paginas/libros">Todos los libros</a></li>
            <li><a class="hideOnMobile" href="<?php echo RUTA_URL; ?>/paginas/prestamos">Prestamos realizados</a></li>
            <li><a class="hideOnMobile" href="<?php echo RUTA_URL; ?>/paginas/reportes">Generar reporte</a></li>
            <li class="logout hideOnMobile"><a style="color: red;" href="<?php echo RUTA_URL; ?>/paginas/cerrarSesion">Cerrar sesión</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#fff"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
        </ul>
    </nav>
