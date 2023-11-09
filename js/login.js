document.addEventListener('DOMContentLoaded', function () {
    var titulo = document.getElementById("titulo");
    var nombreInput = document.getElementById("nombre");
    var passwordInput = document.getElementById("password");
    var crearCuentaInput = document.getElementById("crearCuenta");
    errorLogin = document.getElementsByClassName("error");
    var boton = document.getElementById("boton");
    var language = {
        eng: {
            titulo: "Log in",
            nombre: "Username",
            password: "Password",
            error: "Incorrect login information",
            crearCuenta: "¿Don't have an account yet? Create one in this moment >>",
            boton: "Sign in"
        },
        pl: {
            titulo: "Zaloguj się",
            nombre: "Nazwa użytkownika",
            password: "Hasło",
            error: "Nieprawidłowe dane logowania.",
            crearCuenta: "",
            boton: ""
        },
        es: {
            titulo: "Inicio de sesión",
            nombre: "Nombre de usuario",
            password: "Contraseña",
            error: "Información incorrecta",
            crearCuenta: "¿No dispone de una cuenta? Creela en este momento >>",
            boton: "Entrar"
        }
    };

    // Función para cambiar el idioma
    function changeLanguage(lang) {
        titulo.textContent = language[lang].titulo;
        nombreInput.placeholder = language[lang].nombre;
        passwordInput.placeholder = language[lang].password;
        errorLogin.textContent = language[lang].error;
        crearCuentaInput.textContent = language[lang].crearCuenta;
        boton.value = language[lang].boton; 
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

document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); 

    // Registra los valores
    var name = document.getElementById('nombre').value;
    var password = document.getElementById('password').value;
    // Comprobación de prueba
    if (name === 'Marta' && password === '1234') {
        window.location.href = "html/perfil.html";
    } else {
        // Mensaje de error          *cambiar por idiomas
        alert(errorLogin.textContent);
        // Elimina los datos de los input
        document.getElementById('nombre').value = '';
        document.getElementById('password').value = '';
    }
});

