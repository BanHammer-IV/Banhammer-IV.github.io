let redirection = document.getElementById("returnPage");
let plusButton = document.getElementById("plusBtnStudent");
let minusButton = document.getElementById("minusBtnStudent");
let numberTicket = document.getElementById("ticketStudent");
let selectSeat = document.getElementById("selectSeat");
let divMoney = document.getElementById("money");

let ticket = 0;

redirection.addEventListener("click", ()=>{
    location.href = "../../index.html"
});

selectSeat.addEventListener("click", ()=>{
    if( ticket == 0 ){
        alert("Lo siento, requieres seleccionar minimo un boleto");
    } else {
        location.href = "seleccionAsientos.html";
    }
});

plusButton.addEventListener("click", ()=>{
    ticket = ticket + 1;
    replaceNumber( ticket );
});

minusButton.addEventListener("click", ()=>{
    ticket = ticket - 1;
    replaceNumber( ticket )
});

function replaceNumber( cantidad_Ticket ) {
    let cantTicket = cantidad_Ticket;
    //variable de precio de ticket
    let price = 58.0;
    let totalTicket;

    if( cantTicket == 0 ){
        //Si es menor que 0 el numero que se muestra se debe quedar en ese
        minusButton.setAttribute("disabled", true);
        numberTicket.innerHTML = cantTicket;
        divMoney.innerHTML = "";
    } else if ( cantTicket >= 1 || cantTicket <= 10 ){
        //En caso contrario solo se podran comprar hasta un maximo de 10 boletos    
        minusButton.removeAttribute("disabled", false);
        plusButton.removeAttribute("disabled");
        numberTicket.innerHTML = cantTicket;
        totalTicket = price * cantTicket;
        divMoney.innerHTML = "Total a pagar: " + totalTicket;
    }
    
    if( cantTicket == 10 ) {
        //Si la cantidad de boletos es 10 ya no dejara seguira aumentando
        //el numero
        plusButton.setAttribute("disabled", true);
        numberTicket.innerHTML = cantTicket;
    }

    return cantTicket;
}