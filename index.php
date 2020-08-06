<?php
// Author     : Nicolas Robles
// PRUEBA DESARROLLO SIGMA 3DS
include './conexion/ruta.php';
//include("consultas/consultas.php");
$rutaFinal = retornaRuta();
?>
<!DOCTYPE html>
<html>
    <html lang="es">        
        <!-- METAS -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Prueba Sigma</title>
        <meta name="description" content="Prueba desarrollador para Sigma3ds">
        <meta name="theme-color" content="#e03b64">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $rutaFinal ?>contenido/assets/favicon.ico">
        <link rel="canonical" href="<?php echo $rutaFinal ?>" />
        <meta name="twitter:card" content="summary_large_image" />
        <!-- og tags Facebook -->
        <meta property="og:url" content="<?php echo $rutaFinal ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Prueba sigma3ds" />
        <meta property="og:description" content="Prueba desarrollador para Sigma3ds"/>
        <meta property="og:image" content="<?php echo $rutaFinal ?>contenido/assets/logo.png"/> 
        <!-- Twitter -->
        <meta name="twitter:site" content="<?php echo $rutaFinal ?>" />
        <meta name="twitter:title" content="Prueba sigma3ds" />
        <meta name="twitter:description" content="Prueba desarrollador para Sigma3ds" />
        <meta name="twitter:creator" content="@Nicolas_Robles" />
        <meta name="twitter:image:src" content="<?php echo $rutaFinal ?>contenido/assets/logo.png" />
        <meta name="twitter:domain" content="@Nicolas_Robles" />        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $rutaFinal ?>contenido/css/general.css">   
        <link rel="stylesheet" type="text/css" href="<?php echo $rutaFinal ?>contenido/css/index.css">
        <!-- JS -->    
        <script src="<?php echo $rutaFinal ?>contenido/js/control-formulario.js" type="text/javascript"></script>                
    </head>
    <body>
        <div id="contenedor-global">
            <img src="<?php echo $rutaFinal ?>contenido/assets/logo.png">
            <h1>Prueba de desarrollo Sigma</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 
                enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <div id="contendor-contenido">
                <img src="<?php echo $rutaFinal ?>contenido/assets/sigma-image.png">
                <form id="formulario-registro" action="" onsubmit="registrar(); return false;">
                    <label>Nombre*</label>
                    <input placeholder="Nicolas Robles" type="text" maxlength="50" id="formulario-nombre" name="formulario-nombre" required>
                    <label>Correo*</label>
                    <input placeholder="annicorobles@gmail.com" type="email" maxlength="50" id="formulario-correo" name="formulario-correo" required>
                    <label>Departamento*</label>
                    <select id="formulario-departamento" name="formulario-departamento" onchange="cambioCiudades()" required>
                        <option value="" selected>Selecciona un departamento</option>
                    </select>
                    <label>Ciudad*</label>  
                    <select id="formulario-ciudad" name="formulario-departamento" required disabled>
                        <option value="" selected>Selecciona una Ciudad</option>
                    </select>
                    <button type="submit" value="Enviar">Enviar</button>                                          
                </form>                
            </div>   
            <input id="rutaOculta" value="<?php echo $rutaFinal ?>" type="hidden">
        </div>
        <div id="openModal" class="modalDialog invisible ">
            <div id="contenedorModal">
                <div class="logoModal" ></div>
                <p id="respuesta-formulario">Espara un segundo por favor...</p>
                <button id="boton-modal" class="invisible" onclick="cerrarModal()">Cerrar..</button>                     
            </div>
        </div>
    </body>
</html>
