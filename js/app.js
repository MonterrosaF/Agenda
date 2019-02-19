var agregarContacto = document.getElementById('agregar');
var formulario = document.getElementById('formulario_crear_usuario');
var action = formulario.getAttribute('action');

function crearUsuario() {
    var form_datos = new FormData(formulario);
    for ([key, value] of form_datos.entries()) {
        console.log(key + ": " + value);
    };
    var xhr = new XMLHttpRequest();
    xhr.open('POST', action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            console.log("Resultado " + resultado);
            var json = JSON.parse(resultado);
        };
    };
    xhr.send(form_datos);
};

agregarContacto.addEventListener('click', function (e) {
    e.preventDefault();
    crearUsuario();
});