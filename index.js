

function mensaje(){
    fetch('http://banhammer-iv.github.io/src/ventas?id=1')
    .then( res => res.json())
    .then( data => {

        alert( data );

    })
    .catch( e => console.error( e ));
}