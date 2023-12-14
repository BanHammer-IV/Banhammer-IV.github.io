let ticket;
let sala = document.getElementById("salas");
let arraySeat = document.getElementById("selectedSeat");
let btnChange = document.getElementById("selectSeat");
let silla = "../../images/seleccionAsientos/AvaiableSeat.svg";
let silla2 = "../../images/seleccionAsientos/SelectedSeat.svg";
let divAsiento, imgIn;
let ulList = document.createElement( "ul" );
let liList , letra;
let arrayLetras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

addEventListener('load', procesarData());

console.log( localStorage.getItem( 'myData' ) );

function procesarData() {
    let divMoney = document.getElementById("money");
    let divTicket = document.getElementById("cantTicket");
    var data = localStorage.getItem('myData');
    const arrayData = data.split(", ");
    let dinero = arrayData[ 0 ];
    ticket = arrayData[ 1 ];
    let tipoTicket = arrayData[ 2 ];
    divTicket.innerHTML = tipoTicket + ": " + ticket;
    divMoney.innerHTML = "Total a pagar: $" + dinero + ".00";
}

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

let imgPr, valor, cantSeat = 0, cantTicket;
let arraySelectedSeat = new Array();
function pruebas( letter, num ){
    letra = letter, valor = num;                    //Reasigna los valores de letra y valor
    let LV = letra + valor;
    seat = document.getElementById( LV );  //Busca el asiento con la etiqueta seat
    arraySelectedSeat[ cantSeat ] = LV;  //arraySeat[ 0 ] = A1;
    cantSeat = cantSeat + 1;                        //0
    cantTicket = parseInt( ticket );                //4
    if(cantSeat >= 1 && cantSeat <= cantTicket){ 
        if( seat.getAttribute( "src" ) != silla2 ){
            changeColor( seat, "seleccionar" );
            arraySeat.innerHTML = "Asientos seleccionados: " + arraySelectedSeat;
        } else if( seat.getAttribute( "src" ) == silla2 ){
            cantSeat--;
        }
    } else if( cantSeat > cantTicket ){
        cantSeat = cantTicket;
        let firstPos = document.getElementById( arraySelectedSeat[0] );
        if( seat.getAttribute( "src" ) != silla2 ){
            changeColor( firstPos, "deseleccionar" );
            arraySelectedSeat.shift();
            changeColor( seat, "seleccionar" );  
            arraySeat.innerHTML = "Asientos seleccionados: "+ arraySelectedSeat;
        }
    }
}

function changeColor( imgPro, typeChange ) {
    let imgProp = imgPro, typeCC = typeChange;
    if( typeCC == "seleccionar" ){
        if( imgProp.getAttribute( "src" ) == silla ){
            imgProp.setAttribute("src", silla2);
        }
    } else if( typeCC == "deseleccionar"){
        if( imgProp.getAttribute( "src" ) == silla2 ){
            imgProp.setAttribute("src", silla);
        }
    }
}

btnChange.addEventListener("click", ()=>{
    var paginaPago = 'pagar.html';

    console.log( arraySelectedSeat );
    console.log( arraySelectedSeat.length );
    console.log( parseInt( ticket ) );
    if( arraySelectedSeat.length == 0 ){
        alert("Necesitas seleccionar tus asientos");
    } else if( arraySelectedSeat.length >= 1 && arraySelectedSeat.length < parseInt( ticket ) ){
        alert("Hacen falta asientos por seleccionar");
    } else {
        
        window.open(paginaPago, 'GooglePopup', 'width=600,height=800');
    }
});