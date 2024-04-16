var pfp;
var banner = 0;
var color = 0;
let tipos = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/JPG'];

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

document.getElementsByClassName('añadirBanner')[0].addEventListener('click', function() {
    event.preventDefault();
    document.getElementById('inputBanner').click();
})
document.getElementById('inputBanner').addEventListener('change', function(event) {
    event.preventDefault();
    if (this.files && this.files[0]) { 
    let file = this.files[0];
    let maxTamaño = 1024 * 1024 * 8;
    
    if (tipos.includes(file.type) && file.size <= maxTamaño) {
        var reader = new FileReader();
        banner = this.files[0].name;
        reader.onload = function(e) {
            let boton1 = document.getElementsByClassName('añadirBanner')[0];
            boton1.style.backgroundImage = `url(${e.target.result})`;
            boton1.style.backgroundSize = 'cover';
            boton1.style.backgroundRepeat = 'no-repeat';
        }
        reader.readAsDataURL(file);
    } else {
        alert('El archivo no se ajusta a los parametros.');
    }
}
    
})

let volver = document.getElementById('volver').addEventListener('click', function(event) {
    event.preventDefault();
    if(confirm('La información personal ya ha sido almacenada. Si sale del registro, deberá eliminar sus datos desde la configuración del perfil') == true){
        window.location.href = '../html/inicioSesion.html'
    }
})

let siguiente = document.getElementById('boton').addEventListener('click', function(event) {
    event.preventDefault();
    let colorValor = document.getElementById('selectorColor').value;

    let formData = new FormData(); 
    formData.append('pfp', document.getElementById('inputFoto').files[0]); 
    formData.append('banner', document.getElementById('inputBanner').files[0]); 
    formData.append('color', colorValor); 

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/fotosColor.php');
    //No se usa cuando FormData
    //xhr.setRequestHeader('Content-Type', 'multipart/form-data');
    xhr.addEventListener('load', function() {
        console.log(this.responseText); 
        /*if(this.responseText == 'true'){
            console.log('Es true')
        }else{
            console.log('Es false')
            }*/
    });
    
    xhr.send(formData); 
})