//Obtener el ID
    let cPaypal = document.getElementById( "cPaypal" );
    let cDebit = document.getElementById( "cDebit" );
    let cModal = document.getElementById( "cModal" );

//Creacion de elementos
    //Contenedores
    let divModal = document.createElement( "div" );

cDebit.addEventListener("click", ()=>{
    var paginaPago = 'pagar.php';

    window.open(paginaPago, 'GooglePopup', 'width=600,height=800');
});

cPaypal.addEventListener("click", ()=>{
    var paginaPago = 'pagar.php';

    window.open(paginaPago, 'GooglePopup', 'width=600,height=800');
});


//localStorage.clear();