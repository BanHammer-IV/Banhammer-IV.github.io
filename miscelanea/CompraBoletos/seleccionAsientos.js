let sala = document.getElementById("salas");
let silla = "../../images/seleccionAsientos/AvaiableSeat.svg";
let silla2 = "../../images/seleccionAsientos/SelectedSeat.svg";
let divAsiento, imgIn;
let ulList = document.createElement( "ul" );
let liList , letra;
let arrayLetras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
let arraySelectedSeat;

for(i = 0; i < 10; i++){
    liList = document.createElement( "li" );
    letra = document.createElement("h4");
    letra.setAttribute("class", "row");
    letra.innerText = arrayLetras[ i ];   
    liList.appendChild( letra );
    for (let j = 0; j < 10; j++) {
        divAsiento = document.createElement("button");
            divAsiento.setAttribute("id", "asiento");
            divAsiento.setAttribute("class", "imageprueba");
            divAsiento.setAttribute("onclick", "pruebas( '"+arrayLetras[ i ]+"', "+( j + 1 )+" )");
        imgIn = document.createElement("img");
            imgIn.setAttribute("id", ""+arrayLetras[ i ]+""+( j + 1 )+"");
            imgIn.setAttribute("src", silla);
        divAsiento.appendChild( imgIn );
        liList.appendChild( divAsiento );
    }
    letra = document.createElement("h4");
    letra.setAttribute("class", "row");
    letra.innerText = arrayLetras[ i ];   
    liList.appendChild( letra );
    ulList.appendChild( liList );
}
sala.appendChild( ulList );

let imgPr, valor, cantSeat = 0;
function pruebas( letter, num ){
    letra = letter;
    valor = num;
    seat = document.getElementById(letra + valor);
    cantSeat = cantSeat + 1;
    if(cantSeat >= 1 && cantSeat <= 10){
        changeColor( seat );
    } else if( cantSeat > 10 ){
        alert("Haz sobrepasado el numero de asientos seleccionables");
        cantSeat = 10;
    }
}

function changeColor( imgPro ) {
    let imgProp = imgPro;
    if( imgProp.getAttribute( "src" ) == silla ){
        imgProp.setAttribute("src", silla2);
    } else if( imgProp.getAttribute( "src" ) == silla2 ){
        imgProp.setAttribute("src", silla);
    }
}