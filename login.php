<?php
use illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$user =DB::table('usuarios')
->LeftJoin('perfiles','usuarios.idperfil','=','perfiles.idperfil')
->where('nombreusuario',$_POST['usuario'])->first();

$mensaje = '';
if ($user->password==$_POST['password']){
    $mensaje = "<h1>BIENVENIDO:{$USER->nombreperfil} {$user->nombreusuario}</h1>
    <br><a href='inicio.php?idusuarios={$user->idusuarios}'>Entrar al sistema escolar</a>";
} 
else {
    $mensaje = "<h1>USUARIO Y/O CONTRASEÑA ERRONEOS,FAVOR DE VERIFICAR Y VUELVA AUNTENTIFICARSE</h1>
    <br><a href ='index.html'>Volver</a>";
} 
echo $mensaje;