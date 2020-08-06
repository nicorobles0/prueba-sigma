<?php
include '../../conexion/bdconexion.php';
$data = json_decode(file_get_contents("php://input"));
$nombre = filter_var($data->nombre, FILTER_SANITIZE_STRING);    
$correo = filter_var($data->correo, FILTER_SANITIZE_EMAIL);
$departamento = filter_var($data->departamento, FILTER_SANITIZE_STRING);
$ciudad = filter_var($data->ciudad, FILTER_SANITIZE_STRING);
if (!empty($nombre) && !empty($correo) && !empty($departamento) && !empty($ciudad)) {
    $conexion = connectDB();
    mysqli_set_charset($conexion, "utf8");
    $sql = "INSERT INTO contacts(name, email, state, city) VALUES ('$nombre', '$correo', '$departamento', '$departamento')";
    if (mysqli_query($conexion, $sql)) {
        disconnectDB($conexion);
        echo  'true';
    }else{
        echo 'false';
    }
}