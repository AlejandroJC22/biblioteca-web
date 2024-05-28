<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="index">
        <main>

            <?php
                $id=$_GET['id'];
                $conn = mysqli_connect("localhost:3307","root", "", "biblioteca");

                $sql = "delete from libros where id='".$id."'";
                $reultado=mysqli_query($conn,$sql);

                if($reultado){
                    echo '<h1>Datos eliminados satisfactoriamente, redirigiendo al inicio</h1>';
                    header("refresh:2;url=index.php");
                }else{
                    echo 'Error al cargar los datos: ' . mysqli_error($conn);
                }
            ?>
            
        </main>
    </div>
    <script src="./js/main.js"></script>
</body>
</html>