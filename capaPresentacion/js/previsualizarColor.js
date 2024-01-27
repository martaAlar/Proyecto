document.addEventListener('DOMContentLoaded', function () {
    /*var selecColor;

    var botonPrev = document.getElementById("previsualizar");

    botonPrev.addEventListener("click", function (event) {
        selecColor = document.querySelector('input[name="color"]:checked');

        if (selecColor) {
            var colorFondoBase = document.querySelector(".fondo");

            if (selecColor.value === "1") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #a38080)";
            } else if (selecColor.value === "2") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #a39780)";
            } else if (selecColor.value === "3") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #8f80a3)";
            } else if (selecColor.value === "4") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #80a383)";
            } else if (selecColor.value === "5") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #80a1a3)";
            } else if (selecColor.value === "6") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #b191b8)";
            } else {
                console.log("Error: no se ha seleccionado color");
            }
        }
    })*/

    

});

document.addEventListener('DOMContentLoaded', function () {
let colorSeleccionado;

const colorBase = '#A38080';
const colorDegradado = '#F0EBEB';

window.addEventListener("load", previsualizar, false);

function previsualizar() {
    colorSeleccionado = document.querySelector('#selectorColor');
    colorSeleccionado.value = colorBase;

    colorSeleccionado.addEventListener("input", actualizar, false);

    function actualizar() {
        var colorFondoBase = document.querySelector(".fondo");
        colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, "+colorSeleccionado.value+")";
    }
} 
});
