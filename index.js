

function mensaje(){
    fetch('http://localhost/Portafolio/Cinemex_Proyecto_TIE/src/ventas?id=1')
    .then( res => res.json())
    .then( data => {

        alert( data );

    })
    .catch( e => console.error( e ));
}