let system = document.getElementById("OurSystem");
let signup = document.getElementById("SignUp");
let levels = document.getElementById("Levels");
let points = document.getElementById("Points");
let promotion = document.getElementById("Promotion");
let question = document.getElementById("Question");
let textPresentation = document.getElementById("textPresentation");
let containerGeneral = document.createElement("div");

containerGeneral.setAttribute("id", "containerGen");
textPresentation.appendChild(containerGeneral);

function removedor()
{
    containerGeneral.innerHTML = '';
}

system.addEventListener("click", ()=>{
    if (containerGeneral.hasChildNodes()) {
        removedor();   
    }
    let divSys = document.createElement("div");
    let strong = document.createElement( "strong" );
    let parragraph = document.createElement( "p" );
    let strongS = document.createElement( "strong" );
    let parragraphS = document.createElement( "p" );
    let imageBody = document.createElement( "img" );
    let title = document.createElement( "h2" );

        divSys.setAttribute("class", "textBody");
        containerGeneral.classList.add("containerProgram");
        title.innerHTML = "Estimado Invitado Especial: <br><br>";
        strong.innerHTML = "¿Aún no actualizas tu tarjeta? <br><br>";
        parragraph.innerHTML = "No te preocupes, ven al Centro de Atención al Invitado (CAI) o " +
                        "descarga nuestra APP para que puedas cambiar tu tarjeta y continúes " +
                        "disfrutando los beneficios de ser Invitado Especial Cinemex. <br><br>";
        strongS.innerHTML = "¿Qué esperas?<br><br>";
        parragraphS.innerHTML = "Tienes hasta el 31 de diciembre 2023. " + 
                        "<strong>Gracias por seguir viviendo ¡La Magia del Cine en Cinemex!</strong>";
        imageBody.setAttribute("class", "imageBody");
        imageBody.setAttribute("src", "https://statics.cinemex.com/uploads/cms/attachments/6546a181c4315.jpeg");
        
    divSys.appendChild( title );
    divSys.appendChild( strong );
    divSys.appendChild( parragraph );
    divSys.appendChild( strongS );
    divSys.appendChild( parragraphS );
    containerGeneral.appendChild( divSys );
    containerGeneral.appendChild( imageBody );
});

signup.addEventListener("click", ()=>{
    if(containerGeneral.hasChildNodes()){
        removedor();
    }
});

levels.addEventListener("click", ()=> {
    if(containerGeneral.hasChildNodes()){
        removedor();
    }
});

points.addEventListener("click", ()=> {
    if(containerGeneral.hasChildNodes()){
        removedor();
    }
});

promotion.addEventListener("click", ()=> {
    if(containerGeneral.hasChildNodes()){
        removedor();
    }
});

question.addEventListener("click", ()=> {
    if(containerGeneral.hasChildNodes()){
        removedor();
    }
});
