var rutaOculta;
var infoColombia;
window.onload = function () {
    cargarJson();
};
// FUNCION PARA OBTENER LOS DATOS DEL JSON
function cargarJson() {
    rutaOculta = document.getElementById("rutaOculta").value;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if ((this.readyState === 4 && this.status === 200)) {
            infoColombia = this.responseText;
            setearDepartamentos();
        }
    };
    xmlhttp.open("GET", rutaOculta + 'contenido/recursos/colombia.json');
    xmlhttp.send();
}
// FUNCION PARA OBTENER LOS DEPARTAMENTOS DEL JSON
function setearDepartamentos() {
    var informacioJson = JSON.parse(infoColombia);
    informacioJson = Object.keys(informacioJson);
    cargarDepartamentos("ciudad", informacioJson);
}
// FUNCION PARA CARGAR LOS DEPARTAMENTOS EN SELECT
function cargarDepartamentos(domElement, array) {
    var departamentos = document.getElementById('formulario-departamento');
    for (ciudad in array) {
        var opcion = document.createElement("option");
        opcion.text = array[ciudad];
        departamentos.add(opcion);
    }
    cambioCiudades();
}
// FUNCION PARA CARGAR LAS CIUDADES EN SELECT SEGUN SELECCION DEL USUARIO
function cambioCiudades() {
    var informacioJson = JSON.parse(infoColombia);
    //Declaramos variables para obtener los componentes select departamento y ciudad.
    var departamentos = document.getElementById('formulario-departamento');
    var ciudades = document.getElementById('formulario-ciudad');
    //Igualamos el valosr del departamento al seleccionado por el usuario.
    var departamentoSeleccionado = departamentos.value;
    //limpiamos select de ciudades.
    ciudades.innerHTML = '<option value="">Selecciona una Ciudad...</option>';
    //Cargamos ciudades segun la seleccion
    if (departamentoSeleccionado !== "") {
        ciudades.disabled = false;
        //Se seleccionan las ciudad y se ordenan.
        departamentoSeleccionado = informacioJson[departamentoSeleccionado];
        departamentoSeleccionado.sort();
        //Insertamos los pueblos mediante un FOR.
        departamentoSeleccionado.forEach(function (ciudad) {
            var opcion = document.createElement('option');
            opcion.value = ciudad;
            opcion.text = ciudad;
            ciudades.add(opcion);
        });
    }
}
function registrar() {
    var nombre = document.getElementById("formulario-nombre").value;
    var correo = document.getElementById("formulario-correo").value;
    var departamento = document.getElementById("formulario-departamento").value;
    var ciudad = document.getElementById("formulario-ciudad").value;
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    if (window.XMLHttpRequest) { // para navegadores IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // para navegadores IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if ((this.readyState === 4 && this.status === 200)) {
            LimpiarCamposForm();            
            if (this.responseText === 'true') {
                document.getElementById('respuesta-formulario').innerHTML = "¡Registrado!";
                document.getElementById('boton-modal').classList.remove('invisible');                
            } else {
                document.getElementById('respuesta-formulario').innerHTML = "Algo Salio mal :(";
                document.getElementById('boton-modal').classList.remove('invisible');
            }
        } else {
            document.getElementById('openModal').classList.remove('invisible');
            document.getElementById('openModal').style.opacity = 1;
        }
    };    
    xmlhttp.open('POST', rutaOculta + "contenido/funciones/registrar.php");
    //enviando los valores a registro.php para que inserte los datos
    var datosJson = {nombre: nombre  , correo: correo, departamento: departamento, ciudad: ciudad};    
    var datosJsonFinal = JSON.stringify(datosJson);        
    xmlhttp.send( datosJsonFinal );
}
function LimpiarCamposForm() {
    var formulario = document.getElementById("formulario-registro");
    if (formulario !== null) {
        formulario.reset();
    }
}
function  cerrarModal() {
    document.getElementById('openModal').style.opacity = 0;
    document.getElementById('openModal').classList.add('invisible');
}