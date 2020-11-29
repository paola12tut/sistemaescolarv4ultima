<?php
use illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$user = DB:: table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil','=','perfiles.idperfil')
->where('usuarios.idusuarios', $_GET['idusuario'])->first();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema escolar</title>
    <link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
</head>

<body>
    <div class="container">
    <h1> Sistema escolar </h1>
    

    <?php  if ($user->nombreperfil == 'profesor') {?>
        <h2> Agregar calificacion: </h2>

        <form action="insertar.php" method="post">
            <label for="calificacion"> Calificación: </label>
            <input id="calificacion" type="text" name="calificacion">
            <input class="button" type="button" value="Guardar" onclick="insertar()">
       
       
        </form>
    

    <?php }?>

    <form action="consultar.php" method="post">
        <input class="button" type="button" value="Consultar" onclick="consultar()">
    </form>
</div>

<script>
    axios.post('api/index.php/insertar'),
    {

    }
    
</script>
</body>
</html>