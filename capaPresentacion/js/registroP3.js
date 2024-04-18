let contenedor = document.getElementById('editableDiv');
let contador = document.getElementById('n');
let volver = document.getElementById('volver').addEventListener('click', function(event) {
    event.preventDefault();
    if(confirm('La información personal ya ha sido almacenada. Si sale del registro, deberá eliminar sus datos desde la configuración del perfil') == true){
        window.location.href = '../html/inicioSesion.html'
    }
})

function negrita() {
    let etiqueta = 'b';
    añadirEtiqueta(etiqueta);
}

function copiar() {
    let selectText = window.getSelection().toString();
    if (selectText.length > 0) {
        document.execCommand('copy', false, null);
    }
}

function pegar() {
    // Obtener el texto que está en el portapapeles
    navigator.clipboard.readText().then(texto => {
        // Pegar el texto en el lugar donde está el cursor
        document.execCommand('insertText', false, texto);
    });
}

function borrar() {
    let decision = confirm('Se borrará todo el texto escrito como descripción, ¿está seguro que desea continuar?')
    if (decision) {
        contenedor.innerHTML = '';
    }
}

function mostrarVariable(){
    contenidoEditDiv = contenedor.innerHTML;
    console.log(contenidoEditDiv);
}

function cursiva() {
    let etiqueta = 'i';
    añadirEtiqueta(etiqueta);
}
function añadirEtiqueta(nombreEtiqueta) {
    let seleccion = window.getSelection();
    let textoSeleccionado = window.getSelection().toString();
    if (textoSeleccionado.length > 0) {
        let rango = seleccion.getRangeAt(0);
        let nuevaEtiqueta = document.createElement(nombreEtiqueta);
        rango.deleteContents();
        rango.insertNode(nuevaEtiqueta);
        nuevaEtiqueta.appendChild(document.createTextNode(textoSeleccionado));
    }
}

function borrarFormato() {
    document.execCommand('removeFormat', false, null);
}

function cargarAyuda() {
    alert('¿Qué hace cada botón de edición?\n\n·N - convierte a negrita\n·K - convierte a cursiva\n·Papeles - copia al portapapeles\n·Portapapeles - pega el último texto copiado\n·Papelera - elimina todo el contenido\n·Borrador - elimina el formato\n\nPara usarlo, seleccione una porción del texto y haga clic en el botón para que la acción se realice');
}

let contenidoEditDiv = "";
function mostrarVariable(){
    contenidoEditDiv = document.getElementById("editableDiv").innerHTML;
    console.log(contenidoEditDiv);
    console.log(contenedor.innerHTML.length);
    console.log(contenedor.innerText.length);
}

contenedor.addEventListener('input', function() {
    contador.innerText = contenedor.innerText.length;
    if(contenedor.innerText.length >= 201){
        contador.style.color = '#ff0000';
    }else{
        contador.style.color = '#000000';
    }
    
})

document.getElementById('enviar').addEventListener('click', function(e) {
    e.preventDefault();

    if(contenedor.innerText.length < 201){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../php/almacenarDescripcion.php');
        xhr.setRequestHeader('Content-Type', 'text/plain');
        xhr.addEventListener('load', function(){
            console.log(this.responseText);
            if(this.response == true){
                window.location.href = '../html/registroP4.html';
            }else{
                console.log('No');
            }
        })
        xhr.send(contenedor.innerHTML); 
    }else{
        alert('El número de caracteres es demasiado elevado');
    }
})