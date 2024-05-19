/*let pfp = document.getElementById('pfp');
let banner = document.getElementById('banner');
let nombreApellidos = document.getElementById('nombreApellidos');
let username = document.getElementById('username');
let descripcion = document.getElementById('descripcion');
let color = document.getElementsByTagName('body')[0];*/
var divTags = document.getElementById('tagsDivPerfil');
var divPosts = document.getElementById('divPosts');
var divMatching = document.getElementById('divMatching');
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

/*function configuracion() {
    var contenedorIframe = document.getElementById('contenedorIframe');

    // Crea un elemento iframe
    var iframe = document.createElement('iframe');
    iframe.src = '../html/panelConfiguracion.html'; // Especifica la ruta del documento HTML

    // Establece las dimensiones del iframe 
    iframe.width = '1000';
    iframe.height = '500';

    // Añade el iframe al contenedor
    contenedorIframe.appendChild(iframe);
}*/


window.onload = function() {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Si la solicitud se completó correctamente,
                // Procesa la respuesta 
                var respuesta = JSON.parse(xhr.response);
                //var respuesta = xhr.response;
                //console.log(respuesta[4]);
                
                document.getElementById('pfp').setAttribute('src', '../..' + respuesta[1][0]);
                document.getElementById('banner').setAttribute('src', '../..' + respuesta[1][4]);
                document.getElementById('nombreApellidos').innerText = respuesta[0][2] + ' ' + respuesta[0][4] + ' '  + respuesta[0][6] ;
                document.getElementById('username').innerText = '@' + respuesta[0][0];
                document.getElementById('descripcion').innerHTML = respuesta[1][6];
                document.getElementsByTagName('body')[0].style.background = 'linear-gradient(50deg,#f0ebebb2,'+respuesta[1][2]+')';

                let etiquetas = respuesta[2];
                const cookies = document.cookie.split(';')[0].substring(5);
                
                etiquetas.forEach(etiqueta => {
                    //console.log(etiqueta)
                    let tag = document.createElement('div');
                    tag.setAttribute('class', 'tagsPerfil');
                    tag.style.background = respuesta[1][2] + 'c6';
                    if(cookies == 'EN'){
                        tag.innerText = etiqueta[2];
                        //console.log('eng')
                    }else{
                        //console.log('es');
                        tag.innerText = etiqueta[1];
                    }
                    divTags.appendChild(tag);
                });

                let posts = respuesta[3];
                //console.log(respuesta[3]);
                divPosts.innerHTML = '';
                posts.forEach(post => {
                    //console.log(post[4]);
                    let postDiv = document.createElement('div');
                    let postFila = document.createElement('div');
                    let postImagen = document.createElement('img');
                    let postTexto = document.createElement('p');
                    postDiv.setAttribute('class', 'publicacion');
                    postFila.setAttribute('class', 'filaPost');
                    postImagen.setAttribute('src', '../../' + post[4]);
                    postImagen.setAttribute('class', 'fotoPublicacion');
                    postTexto.innerHTML = post[3];
                    postTexto.setAttribute('class', 'textoPublicacion');
                    
                    postFila.appendChild(postImagen);
                    postFila.appendChild(postTexto);

                    postDiv.appendChild(postFila);

                    divPosts.appendChild(postDiv);
                });
                let matching = respuesta[4];
                matching.forEach(perfil => {
                    let boton = document.createElement('button');
                    let divPerfil  = document.createElement('div');
                    let fila1  = document.createElement('div');
                    fila1.setAttribute('class', 'filaMatching');
                    let imagen = document.createElement('img');


                    divMatching
                })
                //console.log(cookies)
            } else {
                // Si hay algún error
                console.error('Hubo un error en la solicitud.');
            }
        }
    };

    xhr.open('GET', '../php/cargarPerfil.php', true);
    xhr.send();
}
document.addEventListener("DOMContentLoaded", function(event) {
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('crearPublicacion').addEventListener('click', publicacion);
        
        
    });
    
});
/**Abre la ventana para crear una publicación */
function publicacion() {
    // Definir las dimensiones de la ventana emergente
    var width = 1000;
    var height = 500;

    // Calcular el centro de la pantalla
    var left = '200';
    var top = '100';

    // Abrir la ventana emergente
    var nuevaVentana = window.open('../html/crearPublicacion.html', '_blank', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top);

    // Enfocar la nueva ventana (opcional)
    if (window.focus) {
        nuevaVentana.focus();
    }
}