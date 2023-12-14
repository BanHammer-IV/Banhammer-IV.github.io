//Obtener el ID
    let cPaypal = document.getElementById( "cPaypal" );
    let cDebit = document.getElementById( "cDebit" );
    let cModal = document.getElementById( "containerModal" );
    let datos;

//Creacion de elementos
    //Contenedores
    let divModal = document.createElement( "div" );

    //Contenedores - Formulario :d
    let formDebit = document.createElement( "form" );
    let inputMail = document.createElement( "input" );
    let inputCell = document.createElement( "input" );
    let inputCPos = document.createElement( "input" );
    let inputCard = document.createElement( "input" );
    let inputDate = document.createElement( "input" );
    let inputCCVC = document.createElement( "input" );
    let inputName = document.createElement( "input" );
    let inputInfo = document.createElement( "div" );
    let inputPays = document.createElement( "Button" );

cDebit.addEventListener("click", ()=>{
    //Crear el esqueleto de Form
        formDebit.setAttribute("method", "POST");
    //Crear el inputMail
        inputMail.setAttribute("type", "text");
        inputMail.setAttribute("name", "Mail");
        inputMail.setAttribute("id", "Mail");
        inputMail.setAttribute("placeholder", "correoElectronico@ejemplo.com");
    //Crear el inputCell
        inputCell.setAttribute("type", "text");
        inputCell.setAttribute("name", "Celular");
        inputCell.setAttribute("id", "Celular");
        inputCell.setAttribute("maxlength", "10");
        inputCell.setAttribute("placeholder", "667 655 4433");
    //Crear el inputCpos
        inputCPos.setAttribute("type", "text");
        inputCPos.setAttribute("name", "CodigoPostal");
        inputCPos.setAttribute("id", "Codigo");
        inputCPos.setAttribute("placeholder", "Codigo Postal");
    //Crear el inputCard    
        inputCard.setAttribute("type", "text");
        inputCard.setAttribute("name", "Debito");
        inputCard.setAttribute("maxlength", "16");
        inputCard.setAttribute("id", "Card");
        inputCard.setAttribute("placeholder", "1234 1234 1234 1234");
    //Crear el inputDate
        inputDate.setAttribute("type", "text");
        inputDate.setAttribute("name", "MMAA");
        inputDate.setAttribute("maxlength", "4");
        inputDate.setAttribute("placeholder", "MM/AA");
    //Crear el inputCCVC
        inputCCVC.setAttribute("type", "password");
        inputCCVC.setAttribute("name", "CVC");
        inputCCVC.setAttribute("maxlength", "3");
        inputCCVC.setAttribute("placeholder", "CVC");
    //Crear el inputName
        inputName.setAttribute("type", "text");
        inputName.setAttribute("name", "Titular");
        inputName.setAttribute("id", "Nombre");
        inputName.setAttribute("placeholder", "Nombre completo");
    //Crear el inputInfo
        inputInfo.setAttribute("id", "InfoCompra");
        inputInfo.setAttribute("class", "divInfoCompra");
        inputInfo.innerHTML = localStorage.getItem( 'myData' );
    //Crear el inputPays 
        inputPays.innerHTML = " PAGAR"
        inputPays.setAttribute("id", "Comprar");
        inputPays.setAttribute("onclick", "botonPresionado()")

    cModal.appendChild( inputMail );
    cModal.appendChild( inputCell );
    cModal.appendChild( inputCPos );
    cModal.appendChild( inputCard );
    cModal.appendChild( inputDate );
    cModal.appendChild( inputCCVC );
    cModal.appendChild( inputName );
    cModal.appendChild( inputInfo );
    cModal.appendChild( inputPays );
    
    //cModal.appendChild( formDebit );
});


let idMail = "", idCell = "", idCPos = "", idCard = "", idName = "", idInfo;
function botonPresionado()
{
    idMail = document.getElementById( "Mail" ).value;
    idCell = document.getElementById( "Celular" ).value;
    idCPos = document.getElementById( "Codigo" ).value;
    idCard = document.getElementById( "Card" ).value;
    idName = document.getElementById("Nombre").value;    

  var obj={
    "CorreoElectronico": idMail,
    "CodigoPostal": idCPos,
    "NumeroTarjeta": idCard,
    "Nombre": idName,
    "InformacionCompra": localStorage.getItem( 'myData' )
  };
  
  var cadena=JSON.stringify(obj);
  enviarDatos(cadena); 
}

var conexion1;
function enviarDatos(cadena) 
{
  conexion1=new XMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open('POST','../../src/ventas.php', false);
  conexion1.send( cadena );
}

function procesarEventos()
{
  if(conexion1.readyState == 4)
  {
    localStorage.removeItem( 'myData' );
    location.href = "../../index.html";
  } 
  else 
  {
    console.log("Cargando...");
  }
}