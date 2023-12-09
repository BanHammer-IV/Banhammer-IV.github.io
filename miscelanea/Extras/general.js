let system = document.getElementById("OurSystem");
let signup = document.getElementById("SignUp");
let levels = document.getElementById("Levels");
let points = document.getElementById("Points");
let promotion = document.getElementById("Promotion");
let question = document.getElementById("Question");
let textPresentation = document.getElementById("textPresentation");
let containerGeneral = document.createElement("div");
let prueba = document.getElementById( "prueba" );

prueba.addEventListener("click", ()=>{
    console.log( containerGeneral.classList );
});

containerGeneral.setAttribute("id", "containerGen");
textPresentation.appendChild(containerGeneral);

let newClass;
function removedor( actualClass )
{
    newClass = actualClass;
    
    containerGeneral.innerHTML = '';
    console.log( newClass );
    
    if( containerGeneral.classList.contains("containerProgram") ){
        containerGeneral.classList.replace( "containerProgram", newClass );
    } else if( containerGeneral.classList.contains("containerLevel") ){
        containerGeneral.classList.replace( "containerLevel", newClass );
    }
    
}

system.addEventListener("click", ()=>{
    let clase = "containerProgram";
    removedor( clase );   
    containerGeneral.classList.add("containerProgram")
    let divSys = document.createElement("div");
    let strong = document.createElement( "strong" );
    let parragraph = document.createElement( "p" );
    let strongS = document.createElement( "strong" );
    let parragraphS = document.createElement( "p" );
    let imageBody = document.createElement( "img" );
    let title = document.createElement( "h2" );

        divSys.setAttribute("class", "textBody");
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
    let clase = "containerLevel";
    removedor( clase );
    containerGeneral.classList.add( "containerLevel" )

    let p = document.createElement( "p" );
    let btnGrp = document.createElement( "div" );
        let btnUno = document.createElement( "button" );
        let btnBsc = document.createElement( "button" );
        let btnOro = document.createElement( "button" );
        let btnPrm = document.createElement( "button" );
    let divCard = document.createElement("div");
        let imgCard = document.createElement("img");
        let infCard = document.createElement("div");
            let lvl = document.createElement("div");
            let lvD = document.createElement("div");
    let advantage = document.createElement("div");
        let image;

    p.innerHTML = "Forma parte del mejor programa de recompensas que Premia tu Diversión, "+
                "adquiere tu tarjeta y empieza a disfrutar de los beneficios de ser Invitado Especial Cinemex®.<br><br>";
    btnGrp.setAttribute("class", "btnGroup");
    btnUno.setAttribute("class", "buttonDesign");
    btnBsc.setAttribute("class", "buttonDesign");
    btnOro.setAttribute("class", "buttonDesign");
    btnPrm.setAttribute("class", "buttonDesign");
    btnUno.innerHTML = "Uno";
    btnBsc.innerHTML = "Basico";
    btnOro.innerHTML = "Oro";
    btnPrm.innerHTML = "Premium"
    btnGrp.innerHTML = "<br><br>";
    divCard.setAttribute("class", "card");
    imgCard.setAttribute("class", "imageCard");
    imgCard.setAttribute("src", "https://statics.cinemex.com/v2/dist/images/ie/card-one.png");
    infCard.setAttribute("class", "infoCard");
    lvl.setAttribute("class", "level");
    lvD.setAttribute("class", "levelDescription");
    lvD.innerHTML = "Para obtener este nivel puedes inscribirte de forma gratuita al "+
                "programa Invitado Especial Cinemex en nuestros medios digitales o en un Centro de Atención "+
                "al Invitado. <strong>Acumulación del 3%</strong><br><br>";
    advantage.setAttribute("class", "advantage");
    for (let i = 1; i < 8; i++) {
        image = document.createElement("img");
        switch (i) {
            case 1:
                image.setAttribute("src", "https://statics.cinemex.com/uploads/cms/iebenefits/96db4214c26665de651c51e5c85ec9b2.jpg");
            break;
            case 2:
                image.setAttribute("src", "https://statics.cinemex.com/uploads/cms/iebenefits/c71003a72e5718d3292f9bb63c354c7b.jpg");
            break;
            case 3:
                image.setAttribute("src", "https://statics.cinemex.com/uploads/cms/iebenefits/e448f2fcd5f1968848fbd6a86c3cb3e4.jpg");
            break;
            case 4:
                image.setAttribute("src", "https://statics.cinemex.com/uploads/cms/iebenefits/64ad658f091ad4817a843d8c1984fade.jpg");
            break;
            case 5:
                image.setAttribute("src", "https://statics.cinemex.com/uploads/cms/iebenefits/796938b7b95dcc1ea85fcb757c02cdeb.jpg");
            break;
            case 6:
                image.setAttribute("src", "https://statics.cinemex.com/uploads/cms/iebenefits/d3552a806dc8c6de75f28d5b634c254d.jpg");
            break;
            case 7:
                image.setAttribute("src", "https://statics.cinemex.com/uploads/cms/iebenefits/d3ac9361fae51f82e908cbd2c8d332c5.jpg");
            break;
        }
        advantage.appendChild( image );
    }

    btnGrp.appendChild( btnUno );
    btnGrp.appendChild( btnBsc );
    btnGrp.appendChild( btnOro );
    btnGrp.appendChild( btnPrm );
    divCard.appendChild( imgCard );
    infCard.appendChild( lvl );
    infCard.appendChild( lvD );
    divCard.appendChild( infCard );
    containerGeneral.appendChild( p );
    containerGeneral.appendChild( btnGrp );
    containerGeneral.appendChild( divCard );
    containerGeneral.appendChild( advantage );

});

points.addEventListener("click", ()=> {
    let clase = "containerPuntos"
    removedor( clase );
    containerGeneral.classList.add("containerPoints");

    let divText = document.createElement( "div" );
        divText.setAttribute("class", "textoExtra");
        divText.innerHTML = " Los Puntos Cinemex se otorgarán a los miembros del Programa Invitado Especial Cinemex®" +
                "a partir del 1 de agostos de 2023 en nueva Tarjeta Invitado Especial Cinemex.";
    let title = document.createElement("div");
        title.setAttribute("class", "titulo");
        title.innerHTML = "Acumulación de Puntos CINEMEX®";
    let textP = document.createElement("div");
        textP.setAttribute("class", "textoPuntos");
        textP.innerHTML = "La Acumulación de Puntos Cinemex son generados por los consumos en Complejos Cinemex," +
                "de productos participantes directamente en las taquillas o dulcerías de los Complejos " +
                "Cinemex, siempre y cuando el pago no se realice con Puntos Cinemex. Para que se pueda" +
                "realizar la acumulación de la compra es indispensable presentar la tarjeta Invitado" +
                "Especial Cinemex ya sea física o digital en el punto de venta. La acumulación se realiza" +
                "por cantidades exactas, es decir, se aplica el porcentaje vigente de acumulación a la" +
                "cantidad total del consumo en pesos y centavos hasta dos decimales.";
    let titleR = document.createElement("div");
        titleR.setAttribute("class", "titulo");
        titleR.innerHTML = "Redención de Puntos CINEMEX®<br>";
    let textoR = document.createElement("div");
        textoR.setAttribute("class", "textoPuntos");
        textoR.innerHTML = "Para poder redimir los Puntos Cinemex que se tengan acumulados en la Tarjeta Invitado " +
                "Especial Cinemex, es indispensable contar con dicha tarjeta y presentarla antes de realizar " +
                "los consumos en los puntos de venta de los Complejos Cinemex. Se solicitará el NIP de " +
                "transacción que el Invitado generó en la aplicación móvil. Los Boletos se pagarán en su " +
                "totalidad con puntos, para este producto no se acepta un método de pago combinado, es decir, " +
                "con Puntos Cinemex y cualquier otro método de pago. En el caso de productos de dulcería, el " +
                "costo de éstos puede ser parcialmente cubierto con Puntos y parcialmente con dinero en efectivo " +
                "o cualquier otro tipo de pago. Una vez redimidos los Puntos en cualquier complejo Cinemex, no " +
                "podrán ser reembolsados.";
    let titleVi = document.createElement("div");
        titleVi.setAttribute("class", "titulo");
        titleVi.innerHTML = "Vigencia de Puntos CINEMEX®<br>";
    let textoVi = document.createElement("div");
        textoVi.setAttribute("class", "textoPuntos");
        textoVi.innerHTML = "Los Puntos Cinemex vencerán y se cancelarán a los 12 (doce) meses de su generación y/o acumulación.";
    let titleVa = document.createElement("div");
        titleVa.setAttribute("class", "titulo");
        titleVa.innerHTML = "Valor de Puntos CINEMEX®<br>";
    let textoVa = document.createElement("div");
        textoVa.setAttribute("class", "textoPuntos");
        textoVa.innerHTML = "Los Puntos Cinemex equivalen a $1 peso por cada punto y se podrán utilizar hasta donde " + 
                    "alcance para el pago de productos en cualquier Complejo Cinemex.";
    
    containerGeneral.appendChild( divText );
    containerGeneral.appendChild( title );
    containerGeneral.appendChild( textP );
    containerGeneral.appendChild( titleR );
    containerGeneral.appendChild( textoR );
    containerGeneral.appendChild( titleVi );
    containerGeneral.appendChild( textoVi );
    containerGeneral.appendChild( titleVa );
    containerGeneral.appendChild( textoVa );
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
