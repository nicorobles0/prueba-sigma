<?php
include '../../conexion/bdconexion.php';
$conexion = connectDB();
mysqli_set_charset($conexion, "utf8");
$sql = "SELECT * FROM contacts";
if (!$result = mysqli_query($conexion, $sql)) {
    die(mysqli_error());
}
disconnectDB($conexion);
$xhtml = '';
while ($campo = mysqli_fetch_array($result)) {
    $xhtml .= "<p>" . $campo['id'] . "|-".$campo['name'] . " | " . $campo['email'] . " | " . $campo['state'] . " | " . $campo['city'] . "</p>";
}
echo $xhtml
?>    