/*let pfp = document.getElementById('pfp');
let banner = document.getElementById('banner');
let nombreApellidos = document.getElementById('nombreApellidos');
let username = document.getElementById('username');
let descripcion = document.getElementById('descripcion');
let color = document.getElementsByTagName('body')[0];*/

function abrirVentana() {
    // Definir las dimensiones de la ventana emergente
    var width = 600;
    var height = 400;

    // Calcular el centro de la pantalla
    var left = (window.innerWidth - width) / 2;
    var top = (window.innerHeight - height) / 2;

    // Abrir la ventana emergente
    var nuevaVentana = window.open('index.html', '_blank', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top);

    // Enfocar la nueva ventana (opcional)
    if (window.focus) {
        nuevaVentana.focus();
    }
}

function cargarContenido() {
    var contenedorIframe = document.getElementById('contenedorIframe');

    // Crea un elemento iframe
    var iframe = document.createElement('iframe');
    iframe.src = '../html/panelConfiguracion.html'; // Especifica la ruta del documento HTML

    // Establece las dimensiones del iframe 
    iframe.width = '1000';
    iframe.height = '500';

    // Añade el iframe al contenedor
    contenedorIframe.appendChild(iframe);
}

window.onload = function() {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Si la solicitud se completó correctamente,
                // Procesa la respuesta 
                var respuesta = JSON.parse(xhr.response);
                //var respuesta = xhr.response;
                //console.log(respuesta[2]);
                
                document.getElementById('pfp').setAttribute('src', '../..' + respuesta[1][0]);
                document.getElementById('banner').setAttribute('src', '../..' + respuesta[1][4]);
                document.getElementById('nombreApellidos').innerText = respuesta[0][2] + ' ' + respuesta[0][4] + ' '  + respuesta[0][6] ;
                document.getElementById('username').innerText = '@' + respuesta[0][0];
                document.getElementById('descripcion').innerHTML = respuesta[1][6];
                document.getElementsByTagName('body')[0].style.background = 'linear-gradient(50deg,#f0ebebb2,'+respuesta[1][2]+')';

            } else {
                // Si hay algún error
                console.error('Hubo un error en la solicitud.');
            }
        }
    };

    xhr.open('GET', '../php/cargarPerfil.php', true);
    xhr.send();
}