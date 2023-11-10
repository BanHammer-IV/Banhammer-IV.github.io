let selectableSeat = document.getElementById("selectableSeat");

let seleccionables = 4;
let touch = true;

function seleccionar(){
    if(touch != true){
        document.getElementById("selectableSeat").style.backgroundColor = "rgb(10, 172, 4)";
        touch = true;
    }
    else if ( touch == true ) {
        document.getElementById("selectableSeat").style.backgroundColor = "rgb(82, 82, 82)";
        touch = false;
    }
}
/*
    selectableSeat.addEventListener("click", () => {
        if(touch % 2 != 0){
            document.getElementById("selectableSeat").style.backgroundColor = "rgb(10, 172, 4)";
            touch = touch + 1;
            seleccionables = seleccionables - 1;
            console.log(seleccionables);
        }
        else if ( touch % 2 == 0 ) {
            document.getElementById("selectableSeat").style.backgroundColor = "rgb(82, 82, 82)";
            touch = touch - 1;
            seleccionables = seleccionables + 1;
            console.log(seleccionables);
        }
    });
   */ 