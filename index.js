let peliculas = document.getElementById("peliculas");


let cont = 1;


function cambiarPagina( direccion ) {
    if( direccion == 0 ){
        cont = cont - 1;
        peliculas.innerHTML = '';
        mensaje( cont );
    } else if( direccion == 1 ){
        cont = cont + 1;
        peliculas.innerHTML = '';
        mensaje( cont );
    }
}

addEventListener('load', mensaje( 1 ));

function redireccionar( idPelicula ) {
    localStorage.setItem("myMovie", idPelicula);
    location.href = "miscelanea/CompraBoletos/index.html";
}

function mensaje( cant ){
    console.log( cant );
    fetch('http://localhost/Portafolio/Cinemex_Proyecto_TIE/src/peliculas?page=1')
    .then( res => res.json())
    .then( data => {
        for( let i = 0; i < data.length; i++ ){
            let imageMovie = document.createElement( "img" );
            let divImage = document.createElement("div");
            imageMovie.setAttribute("class", "peliculas");
            imageMovie.setAttribute("id", "movie");
            imageMovie.setAttribute("src", data[i].imagenPoster);
            divImage.setAttribute("onclick", "redireccionar("+ ( i + 1 ) +")");
            divImage.appendChild( imageMovie )
            peliculas.appendChild( divImage );

        }
    })
    .catch( e => console.error( e ));
}
/*
addEventListener('load',recuperarDatos,false);



var conexion1;
function recuperarDatos() 
{
  conexion1=new XMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open('GET','pagina1.php', true);
  conexion1.send();
}

function procesarEventos()
{
  var resultados = document.getElementById("resultados");
  if(conexion1.readyState == 4)
  {
    var datos=JSON.parse(conexion1.responseText);
    var salida = "Apellido:"+datos.apellido+"<br>";
    salida=salida+"Nombre:"+datos.nombre+"<br>";
    salida=salida+"Dirección donde debe votar:"+datos.direccion;
    resultados.innerHTML = salida;
  } 
  else 
  {
    resultados.innerHTML = "Cargando...";
  }
}*/