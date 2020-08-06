<?php
// Conectar
function connectDB(){
    $server = "localhost";
    $user = "u164202310_3ds";
    $pass = "u164202310_3ds";
    $bd = "1K?CFQ=1s";
    $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error en la conexion de la base de datos");
    return $conexion;
} 
// Desconectar
function disconnectDB($conexion){
    $close = mysqli_close($conexion) 
        or die("Ha sucedido un error en la desconexion de la base de datos");
    return $close;
}