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
            if(this.responseText == 'true' || valor == ''){
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
        console.log('aqui')
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

    let longitudBandera = valor.length >= 10 && valor.length <= 30; 
    let mayusBandera = /[A-Z]/.test(valor); 
    let numeroBandera = /[0-9]/.test(valor); 
    let simboloBandera = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(valor);

    /*if(longitudBandera){
        claseErrorLongitud.classList.replace(claseErrorLongitud.classList.value, 'far fa-check-circle');
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-check-circle');
    }else{
        claseErrorLongitud = claseFalso;
    }

    if(mayusBandera){
        claseErrorMayuscula = claseCorrecto;
    }else{
        claseErrorMayuscula = claseFalso;
    }

    if(numeroBandera){
        claseErrorNumero = claseCorrecto;
    }else{
        claseErrorNumero = claseFalso;
    }

    if(simboloBandera){
        claseErrorSimbolo = claseCorrecto;
    }else{
        claseErrorSimbolo = claseFalso;
    }*/

    if(longitudBandera){
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-check-circle');
    }else{
        claseErrorLongitud.classList.remove('e');
        claseErrorLongitud.classList.add('far', 'fa-times-circle');
    }

    if(mayusBandera){
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-check-circle');
    }else{
        claseErrorMayuscula.classList.remove('e');
        claseErrorMayuscula.classList.add('far', 'fa-times-circle');
    }

    if(numeroBandera){
        claseErrorNumero.classList.remove('e');
        claseErrorNumero.classList.add('far', 'fa-check-circle');
    }else{
        claseErrorNumero.classList.remove('e');
        claseErrorNumero.classList.add('far', 'fa-times-circle');
    }

    if(simboloBandera){
        claseErrorSimbolo.classList.remove('e');
        claseErrorSimbolo.classList.add('far', 'fa-check-circle');
    }else{
        claseErrorSimbolo.classList.remove('e');
        claseErrorSimbolo.classList.add('far', 'fa-times-circle');
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

    if(!/^[A-Z][a-z]*$/.test(nombre)){
        nombreBandera = true;
    }

    if(!/^[A-Z][a-z]*$/.test(apellido1)){
        apellido1Bandera = true;
    }

    if(apellido2.value != ''){
        if(!/^[A-Z][a-z]*$/.test(apellido2)){
            apellido2Bandera = true;
        }
    }

    if(fecha.value > fechaActual){
        fechaBandera = true;
    }

    if(!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email.value)){
        emailBandera = true;
    }

    console.log('Email: ' + ultimaBanderaEmail);
    console.log(nombreBandera);
})