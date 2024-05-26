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
                
                var etiquetas = respuesta[1];
                const cookies = document.cookie.split(';')[0].substring(5);

                var posts = respuesta[2];
                //console.log(respuesta[4]);
                divPosts.innerHTML = '';
                posts.forEach(post => {
                    console.log(posts);
                    let postDiv = document.createElement('div');
                    let postTag = document.createElement('div');
                    let tagHR = document.createElement('hr');
                    let postFila = document.createElement('div');
                    let postImagen = document.createElement('img');
                    let postTexto = document.createElement('p');

                    postDiv.setAttribute('class', 'publicacion');
                    postFila.setAttribute('class', 'filaPost');

                    postTexto.innerHTML = post[3];

                    postTag.setAttribute('class', 'etiquetaPublicacion');
                    postTag.style.background = respuesta[1][2] + 'c6';
                    etiquetas.forEach(etiqueta => {
                        if(etiqueta[0] == post[2]){
                            postTag.innerText = etiqueta[1];
                        } else {
                            console.log('xd');
                        }
                    });

                    tagHR.setAttribute('class', 'lineaEtiqueta');

                    // Create a new <style> element
                    let style = document.createElement('style');

                    // Add the CSS rule with !important
                    style.innerHTML = `.lineaEtiqueta { background-color: ${respuesta[1][2]}c6 !important; }`;

                    // Append the style element to the head
                    document.head.appendChild(style);

                    if(post[4] == 0){
                        postTexto.setAttribute('class', 'textoPublicacionSinImg');
                    } else {
                        postTexto.setAttribute('class', 'textoPublicacion');
                        postImagen.setAttribute('src', '../../' + post[4]);
                        postImagen.setAttribute('class', 'fotoPublicacion');
                        postFila.appendChild(postImagen);
                    }

                    console.log(post[4]);
                    postFila.appendChild(postTexto);
                    postDiv.appendChild(postTag);
                    postDiv.appendChild(tagHR);
                    postDiv.appendChild(postFila);

                    divPosts.appendChild(postDiv);

                });
                
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