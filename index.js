let movie = document.getElementById( "movie" );

movie.addEventListener("click", ()=>{
    location.href = "miscelanea/ComprarBoletos/index.html";
});

function mensaje(){
    fetch('http://banhammer-iv.github.io/src/ventas?id=1')
    .then( res => res.json())
    .then( data => {

        alert( data );

    })
    .catch( e => console.error( e ));
}