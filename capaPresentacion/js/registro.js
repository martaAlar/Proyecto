/**
 * IDIOMA
 */
document.addEventListener('DOMContentLoaded', function () {
    var titulo = document.getElementById("titulo");
    var nombreInput = document.getElementById("nombre");
    var primerApellidoInput = document.getElementById("prApellido");
    var segundoApellidoInput = document.getElementById("sgApellido");
    var emailInput = document.getElementById("mail");
    var fechaNacInput = document.getElementById("fechaNac");
    var userInput = document.getElementById("user");
    var passwordInput = document.getElementById("password");
    var colorPerfilInput = document.getElementById("colorPerfil");
    
    errorLogin = document.getElementsByClassName("error");

    var language = {
        eng: {
            titulo: "Sign up",
            nombre: "Name",
            error: "Incorrect login information",
            primerApellido : "First surname",
            segundoApellido : "Second surname",
            email : "Mail",
            fechaNac : "Date of birth",
            user : "User",
            password: "Password",
            colorPerfil : "Profile color"

        },
        pl: {
            titulo: "Zaloguj się",
            nombre: "",
            error: "Nieprawidłowe dane logowania.",
            primerApellido : "",
            segundoApellido : "",
            email : "",
            fechaNac : "",
            user: "Nazwa użytkownika",
            password: "Hasło",
            colorPerfil : ""
        },
        es: {
            titulo: "Registro",
            nombre: "Nombre",
            error: "Información de registro incorrecta",
            primerApellido : "Primer apellido",
            segundoApellido : "Segundo apellido",
            email : "Correo",
            fechaNac : "Fecha de nacimiento",
            user : "Usuario",
            password: "Contraseña",
            colorPerfil : "Color del perfil"
        }
    };

    // Función para cambiar el idioma
    function changeLanguage(lang) {
        titulo.textContent = language[lang].titulo;
        nombreInput.placeholder = language[lang].nombre;
        errorLogin.textContent = language[lang].error;
        primerApellidoInput.placeholder = language[lang].primerApellido;
        segundoApellidoInput.placeholder = language[lang].segundoApellido;
        emailInput.placeholder = language[lang].email;
        fechaNacInput.textContent = language[lang].fechaNac;
        userInput.placeholder = language[lang].user;
        passwordInput.placeholder = language[lang].password;
        colorPerfilInput.textContent = language[lang].colorPerfil;
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

/**
 * VALIDACIÓN DE FORMULARIO (prueba)
 */

document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); 

    // Registra los valores
    var name = document.getElementById('nombre').value;
    var password = document.getElementById('password').value;
    // Comprobación de prueba
    if (name === 'Marta' && password === '1234') {
        window.location.href = "../html/perfil.html";
    } else {
        // Mensaje de error          *cambiar por idiomas
        alert(errorLogin.textContent);
        // Elimina los datos de los input
        document.getElementById('nombre').value = '';
        document.getElementById('password').value = '';
    }
});

