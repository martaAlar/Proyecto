var pfp;
let tipos = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/JPG'];
let contenedor = document.getElementById('editableDiv')
let contador = document.getElementById('n');
var contenedorTags = document.getElementById('contenedorEtiquetas');
document.getElementsByClassName('añadirFoto')[0].addEventListener('click', function() {
    event.preventDefault();
    document.getElementById('inputFoto').click();
})
document.getElementById('inputFoto').addEventListener('change', function(event) {
    event.preventDefault();
    if (this.files && this.files[0]) { 
    let file = this.files[0];
    let maxTamaño = 1024 * 1024 * 8;
    
    if (tipos.includes(file.type) && file.size <= maxTamaño) {
        var reader = new FileReader();
        pfp = this.files[0].name;
           
        reader.onload = function(e) {
            let boton1 = document.getElementsByClassName('añadirFoto')[0];
            boton1.style.backgroundImage = `url(${e.target.result})`;
            boton1.style.backgroundSize = 'cover';
            boton1.style.backgroundRepeat = 'no-repeat';
        }
        reader.readAsDataURL(file);
    } else {
        alert('File type or size not supported.');
    }
}
})

function negrita() {
    let etiqueta = 'b';
    añadirEtiqueta(etiqueta);
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

contenedor.addEventListener('input', function() {
    contador.innerText = contenedor.innerText.length;
    if(contenedor.innerText.length >= 251){
        contador.style.color = '#ff0000';
    }else{
        contador.style.color = '#000000';
    }

    let max = 250;
    nCharac = contenedor.innerText.length;
    rest = max - nCharac;

    if(rest < 0){
        contenedor.innerText = contenedor.innerText.substring(0, max-1);
    }

    
})

window.onload = function() {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Si la solicitud se completó correctamente,
                // Procesa la respuesta 
                var respuesta = JSON.parse(xhr.response);
                
                //let etiquetas = respuesta[0];
                
                respuesta.forEach(etiqueta => {
                    console.log(etiqueta)
                    let tag = document.createElement('input');
                    tag.setAttribute('type', 'radio');
                    tag.setAttribute('class', 'inputLista');
                    tag.setAttribute('name', 'tags');
                    tag.setAttribute('value', etiqueta[0]);
                    tag.setAttribute('id', etiqueta[1])
                    let label = document.createElement('label');
                    label.setAttribute('class', 'labelLista');
                    label.setAttribute('for', etiqueta[1]);
                    label.innerText = etiqueta[1];
                    let br = document.createElement('br');
                    let br2 = document.createElement('br');


                    
                        //console.log('es');
                        tag.innerText = etiqueta[1];
                    
                        contenedorTags.appendChild(tag);
                        contenedorTags.appendChild(label);
                        contenedorTags.appendChild(br);
                        contenedorTags.appendChild(br2);
                });
                //console.log(cookies)
            } else {
                // Si hay algún error
                console.error('Hubo un error en la solicitud.');
            }
        }
    };

    xhr.open('GET', '../php/cargarEtiquetasUsuario.php', true);
    xhr.send();
}

let siguiente = document.getElementById('boton').addEventListener('click', function(event) {
    event.preventDefault();
    
    let selectOption = document.querySelector('input[name="tags"]:checked');
    if(document.getElementById('editableDiv').innerHTML != ''){

    
        if (selectOption) {
            let formData = new FormData();
             if(document.getElementById('inputFoto').files[0]){
                formData.append('foto', document.getElementById('inputFoto').files[0]); 
             }else{
                formData.append('foto', 0); 
             }
            
            formData.append('texto', document.getElementById('editableDiv').innerHTML); 
            formData.append('etiqueta', selectOption.value); 

            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/guardarPublicacion.php');
            //No se usa cuando FormData
            //xhr.setRequestHeader('Content-Type', 'multipart/form-data');
            xhr.addEventListener('load', function() {
                console.log(this.responseText); 
                if(this.responseText == true){
                    window.close();
                }else{
                    alert('Ha habido un problema con el inserción de datos');
                    }
            });
            
            xhr.send(formData); 
        } else {
            alert('Seleccione una etiqueta para asociar su publicación')
        }
    }else{
        alert('Por favor, inserte texto para la publicación');
    }

    
})