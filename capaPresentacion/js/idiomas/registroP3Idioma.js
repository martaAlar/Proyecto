document.addEventListener('DOMContentLoaded', function () {
    var titulo = document.getElementById("titulo");
    var atras = document.getElementById("volver");
    var siguiente = document.getElementById("enviar");

    // Función para cambiar el idioma
    function changeLanguage(lang) {

        fetch('../js/idiomas/idiomas.json')
        .then(response => response.json())
        .then(traducciones => {
            let idioma = window.location.hash;
            let idiomaSub = idioma.substring(1)
            let idiomaDatos = traducciones.find(obj => obj.hasOwnProperty(idiomaSub));

            //console.log(idiomaDatos[idiomaSub].registroP2.titulo)
            //console.log(idiomaDatos)
            titulo.textContent = idiomaDatos[idiomaSub].registroP3.titulo;
            atras.textContent = idiomaDatos[idiomaSub].registroP3.atras;
            siguiente.textContent = idiomaDatos[idiomaSub].registroP3.siguiente;
        })
        .catch(error => {
            console.log(error)
        })
         
    }

    // Cambiar idioma al cargar la página según el hash
    if (window.location.hash === "#eng") {
        changeLanguage("eng");
    } else if (window.location.hash === "#es") {
        changeLanguage("es");
    } else if (window.location.hash === "#pl") {
        changeLanguage("pl");
    }

    // Manejar clic en botones de cambio de idioma
    var bEspañol = document.getElementById("bEspañol");
    bEspañol.addEventListener("click", function (event) {
        event.preventDefault();
        window.location.hash = "#es"; // Cambiar la ubicación de anclaje
        changeLanguage("es"); // Cambiar el idioma sin recargar
    });

    var bIngles = document.getElementById("bIngles");
    bIngles.addEventListener("click", function (event) {
        event.preventDefault();
        window.location.hash = "#eng";
        changeLanguage("eng");
    });

    var bPolaco = document.getElementById("bPolaco");
    bPolaco.addEventListener("click", function (event) {
        event.preventDefault();
        window.location.hash = "#pl";
        changeLanguage("pl");
    });
});