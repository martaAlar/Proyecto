let contenedor = document.getElementById('contenedorEtiquetas');

window.onload = function() {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                
                // Si la solicitud se completó correctamente,
                // Procesa la respuesta 
                var respuesta = JSON.parse(xhr.response);
                //var respuesta = xhr.responseText;
                console.log(respuesta);
                respuesta.forEach(etiqueta => {
                    ////console.log(etiqueta);
                    let input = document.createElement('input');
                    input.setAttribute('type', 'checkbox');
                    input.setAttribute('class', 'botonesElección');
                    input.setAttribute('name', 'tags');
                    input.setAttribute('id', etiqueta.idHTML);
                    input.setAttribute('value', etiqueta[0]);
                    input.setAttribute('onchange', 'comprobacion()');

                    let label = document.createElement('label');
                    label.innerText = etiqueta.nombreEtiquetaES;
                    if (window.location.hash === "#eng") {
                        label.innerText = etiqueta.nombreEtiquetaEN;
                    } else if (window.location.hash === "#es") {
                        label.innerText = etiqueta.nombreEtiquetaES;
                    }
                    console.log(etiqueta.nombreEtiquetaEN)
                    label.setAttribute('for', etiqueta.idHTML);

                    contenedor.appendChild(input);
                    contenedor.appendChild(label);
                });
            } else {
                // Si hay algún error
                console.error('Hubo un error en la solicitud.');
            }
        }
    };

    xhr.open('GET', '../php/cargarEtiquetas.php', true);
    xhr.send();
}

function comprobacion() {
    let checkbox = document.querySelectorAll('input[type="checkbox"]');
    let limite = 5;
    let seleccionados = 0;

    for (let i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            seleccionados++;
        }
    }

    if (seleccionados >= limite) {
        for (let i = 0; i < checkbox.length; i++) {
            if (!checkbox[i].checked) {
                checkbox[i].disabled = true;
            }
        }
    } else {
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].disabled = false;
        }
    }

}

document.getElementById('enviar').addEventListener('click', function(e) {
    e.preventDefault();

    let arrayEtiquetas = [];

    let etiquetasSelect = document.getElementsByName("tags");
    for(let i of etiquetasSelect)
    {
        if(i.checked) {
            arrayEtiquetas.push({value: i.value });
        };
    }
    if(arrayEtiquetas == 0){
        alert('Por favor, elija al menos una opción');
    }else if(arrayEtiquetas.length < 12){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../php/almacenarEtiquetas.php');
        //xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.addEventListener('load', function(){
            console.log(this.responseText);
            if(this.response == true){
                window.location.href = '../html/perfil.html';
            }else{
                console.log('No');
            }
        })
        xhr.send(JSON.stringify(arrayEtiquetas)); 
    }else{
        alert('El número de caracteres es demasiado elevado');
    }
})