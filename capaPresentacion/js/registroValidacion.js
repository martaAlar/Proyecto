/**Declaración variables */
let enviar = document.getElementById('boton');
let contraseña = document.getElementById('password');
let fecha = document.getElementById('fechaNacValor');
let user = document.getElementById('user');
let email = document.getElementById('mail');
let nombre = document.getElementById('nombre');
let apellido1 = document.getElementById('prApellido');
let apellido2 = document.getElementById('sgApellido');

let ultimaBanderaUser = true;
let ultimaBanderaEmail = true;

let longitudBandera = true;
let mayusBandera = true; 
let numeroBandera = true; 
let simboloBandera = true;
/**Declarar máximo de formulario a la fecha actual */
const date = new Date();

let dia = date.getDate();
let mes = date.getMonth() + 1;
let año = date.getFullYear();

dia = dia < 10 ? '0' + dia : dia;
mes = mes < 10 ? '0' + mes : mes;

let fechaActual = `${año}-${mes}-${dia}`;
let fechaActualObj = new Date(`${año}-${mes}-${dia}`);
fecha.setAttribute('max', fechaActual)

/**Cambiar primera letra del nombre y apellidos a mayúscula automáticamente */

nombre.addEventListener('input', function() {
    let valor = nombre.value;
    
    let nuevoValor = valor.charAt(0).toUpperCase() + valor.slice(1);
    
    nombre.value = nuevoValor;
})

apellido1.addEventListener('input', function() {
    let valor = apellido1.value;
    
    let nuevoValor = valor.charAt(0).toUpperCase() + valor.slice(1);
    
    apellido1.value = nuevoValor;
})

apellido2.addEventListener('input', function() {
    let valor = apellido2.value;
    
    let nuevoValor = valor.charAt(0).toUpperCase() + valor.slice(1);
    
    apellido2.value = nuevoValor;
})

/**Comprobación que el username no está registrado en la base de datos */
user.addEventListener('input', function() {
    let claseErrorUser = document.getElementById('erUser');
    let valor = user.value;
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/comprobacionNombreUsuario.php');
    xhr.setRequestHeader('Content-Type', 'text/plain');
    xhr.addEventListener('load', function() {
        //console.log(this.responseText); 
        if(this.responseText == 'true' || valor == ''){
            ultimaBanderaUser = true;
            claseErrorUser.classList.remove('e');
            claseErrorUser.classList.add('far', 'fa-times-circle');
        }else{
            ultimaBanderaUser = false;
            claseErrorUser.classList.remove('e');
            claseErrorUser.classList.add('far', 'fa-check-circle');
            }
    });

    xhr.send(valor); 
});

/**Comprobación que el email no está registrado en la base de datos */
email.addEventListener('input', function() {
    let claseErrorMail = document.getElementById('erMail');
    let valor = email.value;
    if(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(valor)){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '../php/comprobacionEmail.php');
        xhr.setRequestHeader('Content-Type', 'text/plain');
        xhr.addEventListener('load', function() {
            ultimaBanderaEmail = this.responseText;
            //console.log(this.responseText); 
            if(this.responseText == '1' || valor == ''){
                ultimaBanderaEmail = true;
                claseErrorMail.classList.remove('e');
                claseErrorMail.classList.add('far', 'fa-times-circle');
            }else{
                ultimaBanderaEmail = false;
                claseErrorMail.classList.remove('e');
                claseErrorMail.classList.add('far', 'fa-check-circle');
                }
        });
        
        xhr.send(valor); 
    }else{
        claseErrorMail.classList.remove('e');
        claseErrorMail.classList.add('far', 'fa-times-circle');
    }
    

});

contraseña.addEventListener('input', function() {
    let valor = contraseña.value;
    let claseCorrecto = 'far fa-check-circle';
    let claseFalso = 'far fa-times-circle';

    let claseErrorLongitud = document.getElementById('erLong');
    let claseErrorMayuscula = document.getElementById('erMayus');
    let claseErrorNumero = document.getElementById('erNum');
    let claseErrorSimbolo = document.getElementById('erSim');

    let longitudTest = valor.length >= 10 && valor.length <= 30; 
    let mayusTest = /[A-Z]/.test(valor); 
    let numeroTest = /[0-9]/.test(valor); 
    let simboloTest = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(valor);

    if(longitudTest){
        longitudBandera = false;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-check-circle');
    }else{
        longitudBandera = true;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-times-circle');
    }

    if(mayusTest){
        mayusBandera = false;
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-check-circle');
    }else{
        mayusBandera = true;
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-times-circle');
    }

    if(numeroTest){
        numeroBandera = false;
        claseErrorNumero.classList.remove('e');
        claseErrorNumero.classList.add('far', 'fa-check-circle');
    }else{
        numeroBandera = true;
        claseErrorNumero.classList.remove('e');
        claseErrorNumero.classList.add('far', 'fa-times-circle');
    }

    if(simboloTest){
        simboloBandera = false;
        claseErrorSimbolo.classList.remove('e');
        claseErrorSimbolo.classList.add('far', 'fa-check-circle');
    }else{
        simboloBandera = true;
        claseErrorSimbolo.classList.remove('e');
        claseErrorSimbolo.classList.add('far', 'fa-times-circle');
    }
})


nombre.addEventListener('input', function() {
    let valor = nombre.value;

    let claseErrorLongitud = document.getElementById('erNombre');

    let longitudTest = valor.length >= 1 && valor.length <= 40; 
    let mayusTest = /^[A-Z][a-z]*$/.test(valor);

    if(longitudTest){
        longitudBandera = false;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-check-circle');
    }else{
        longitudBandera = true;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-times-circle');
    }

    if(mayusTest){
        mayusBandera = false;
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-check-circle');
    }else{
        mayusBandera = true;
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-times-circle');
    }

})

apellido1.addEventListener('input', function() {
    let valor = apellido1.value;

    let claseErrorLongitud = document.getElementById('erPrAp');

    let longitudTest = valor.length >= 1 && valor.length <= 40; 
    let mayusTest = /^[A-Z][a-z]*$/.test(valor);

    if(longitudTest){
        longitudBandera = false;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-check-circle');
    }else{
        longitudBandera = true;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-times-circle');
    }

    if(mayusTest){
        mayusBandera = false;
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-check-circle');
    }else{
        mayusBandera = true;
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-times-circle');
    }

})

apellido2.addEventListener('input', function() {
    let valor = apellido2.value;

    let claseErrorLongitud = document.getElementById('erSegAp');

    let longitudTest = valor.length >= 1 && valor.length <= 40; 
    let mayusTest = /^[A-Z][a-z]*$/.test(valor);

    if(!valor){
        longitudBandera = false;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-circle');
    }else{
        if(longitudTest){
        longitudBandera = false;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-check-circle');
        }else{
            longitudBandera = true;
            claseErrorLongitud.classList.remove('e');
            claseErrorLongitud.classList.add('far', 'fa-times-circle');
        }

        if(mayusTest){
            mayusBandera = false;
            claseErrorMayuscula.classList.remove('e');
            claseErrorMayuscula.classList.add('far', 'fa-check-circle');
        }else{
            mayusBandera = true;
            claseErrorMayuscula.classList.remove('e');
            claseErrorMayuscula.classList.add('far', 'fa-times-circle');
        }
    }
    

})

fecha.addEventListener('input', function() {
    let valor = fecha.value;

    let claseErrorLongitud = document.getElementById('erFecha');

    let validezTest = valor < fechaActual; 

    if(!valor){
        longitudBandera = false;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-times-circle');
    }else{
        if(validezTest){
        longitudBandera = false;
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-check-circle');
        }else{
            longitudBandera = true;
            claseErrorLongitud.classList.remove('e');
            claseErrorLongitud.classList.add('far', 'fa-times-circle');
        }
    }
    

})

enviar.addEventListener('click', function(evento) {
    evento.preventDefault();

    nombre = document.getElementById('nombre').value;
    apellido1 = document.getElementById('prApellido');
    apellido2 = document.getElementById('sgApellido');
    fecha = document.getElementById('fechaNacValor');
    email = document.getElementById('mail');
    user = document.getElementById('user');
    let contraseña = document.getElementById('password');

    let nombreBandera = false;
    let apellido1Bandera = false;
    let apellido2Bandera = false;
    let fechaBandera = false;
    let emailBandera = false;
    let userBandera = false;
    let contraseñaBandera = false;

    apellido1Value = apellido1.value.trim();
    apellido2Value = apellido2.value.trim();

    if(!/^[A-Z][a-z]*$/.test(nombre) || nombre.length > 40 || nombre.value == ''){
        nombreBandera = true;
    }

    if(!/^[A-Z][a-z]*$/.test(apellido1Value) || apellido1Value.length > 40 || apellido1Value == '' || apellido1Value.length < 1){
        apellido1Bandera = true;
    }

    if(apellido2.value != ''){
        if(!/^[A-Z][a-z]*$/.test(apellido2Value) || apellido2Value > 40 || apellido2Value > 40){
            apellido2Bandera = true;
        }
    }else{
        apellido2Bandera = false;
    }

    if(fecha.value > fechaActual || fecha.value == ''){
        fechaBandera = true;
    }

    if(!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email.value) || email.value == '' || ultimaBanderaEmail == true){
        emailBandera = true;
    }

    if(user.value < 1 || user.value > 60 || user.value == ''){
        userBandera = true;
    }

    if(contraseña.value == ''){
        contraseñaBandera = true;
    }else{
        if(longitudBandera || mayusBandera || numeroBandera ||simboloBandera){
            contraseñaBandera = true;
        }else{
            contraseñaBandera = false;
        }
    }
    //console.log('Email: ' + emailBandera);
    if (!nombreBandera && !apellido1Bandera && !apellido2Bandera && !fechaBandera && !emailBandera && !userBandera && !contraseñaBandera) {
        try {
            const form = document.getElementById('formulario');

            form.submit();
        } catch (error) {
            console.log(error);
        }
        
    } else {
        console.log('Fallo');
    }
      

})