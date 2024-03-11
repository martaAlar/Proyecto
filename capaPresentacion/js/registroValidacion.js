let enviar = document.getElementById('boton');
let contraseña = document.getElementById('password');

contraseña.addEventListener('input', function() {
    let valor = contraseña.value;
    let claseCorrecto = 'far fa-check-circle';
    let claseFalso = 'far fa-times-circle';

    let claseErrorLongitud = document.getElementById('erLong');
    let claseErrorMayuscula = document.getElementById('erMayus');
    let claseErrorNumero = document.getElementById('erNum');
    let claseErrorSimbolo = document.getElementById('erSim');

    let longitudBandera = valor.length >= 8; 
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

    let nombre = document.getElementById('nombre');
    let apellido1 = document.getElementById('prApellido');
    let apellido2 = document.getElementById('sgApellido');
    let fecha = document.getElementById('fechaNacValor');
    let email = document.getElementById('mail');
    let user = document.getElementById('user');
    let contraseña = document.getElementById('password');

    
})