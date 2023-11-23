let sala = document.getElementById("salaPrueba");
let etiquetaDiv;
let etiquetaImg

let cant = 2;
for (let i = 0; i < cant; i++) {
        etiquetaDiv = document.createElement("div");
        etiquetaDiv.setAttribute("id", "selectableSeat");
        etiquetaDiv.setAttribute("class", "available Seat");
        etiquetaDiv.setAttribute("onclick", "seleccionar()");

        etiquetaImg = document.createElement("img");
        etiquetaImg.setAttribute("src", "../../images/Icon/Silla.svg");
        etiquetaDiv.appendChild( etiquetaImg );
        sala.appendChild( etiquetaDiv );
    
}
