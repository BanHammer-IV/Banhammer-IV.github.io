let selectSeat = document.getElementById("selectSeat");
let redirection = document.getElementById("returnPage");
let plusButton = document.getElementById("plusBtnStudent");
let minusButton = document.getElementById("minusBtnStudent");
let numberTicket = document.getElementById("ticketStudent");
let divMoney =  document.getElementById("money");
let divTickets = document.getElementById("cantTicket");

let ticket = 0;
let cantTicket, totalTicket, clasificationName;
redirection.addEventListener("click", ()=>{
    location.href = "../../index.html"
});

selectSeat.addEventListener("click", ()=>{
    if(ticket == 0){
        alert("Lo siento, requieres seleccionar minimo un boleto");
    } else {
        let temp =  totalTicket + ", "+ cantTicket + ", "+ clasificationName;
        localStorage.setItem('myData', temp);
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
    cantTicket = cantidad_Ticket;
    let price = 58.0;//variable de precio de ticket
    clasificationName = document.getElementById("clasName").textContent;

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
        divMoney.setAttribute("value", "Total a pagar: $" + totalTicket + ".00");
        divTickets.setAttribute("value", clasificationName+": "+cantTicket);
    }
    
    if( cantTicket == 10 ) {
        //Si la cantidad de boletos es 10 ya no dejara seguira aumentando
        //el numero
        plusButton.setAttribute("disabled", true);
        numberTicket.innerHTML = cantTicket;
    }
}