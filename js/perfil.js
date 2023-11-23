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
    iframe.src = 'registroP1.html'; // Especifica la ruta del documento HTML que quieres cargar

    // Establece las dimensiones del iframe (ajusta según sea necesario)
    iframe.width = '1000';
    iframe.height = '500';

    // Añade el iframe al contenedor
    contenedorIframe.appendChild(iframe);
}
