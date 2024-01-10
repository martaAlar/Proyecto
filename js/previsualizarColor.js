document.addEventListener('DOMContentLoaded', function () {
    var selectedColor;

    var botonPrev = document.getElementById("previsualizar");

    botonPrev.addEventListener("click", function (event) {
        selectedColor = document.querySelector('input[name="color"]:checked');

        if (selectedColor) {
            var colorFondoBase = document.querySelector(".fondo");
            
            if (selectedColor.value === "Color 1") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #a38080)";
            } else if (selectedColor.value === "Color 2") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #a39780)";
            } else if (selectedColor.value === "Color 3") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #8f80a3)";
            } else if (selectedColor.value === "Color 4") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #80a383)";
            } else if (selectedColor.value === "Color 5") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #80a1a3)";
            } else if (selectedColor.value === "Color 6") {
                colorFondoBase.style.background = "linear-gradient(50deg, #f0ebeb, #b191b8)";
            } else {
                console.log("Error: no se ha seleccionado color");
            }
        }
    })
});

