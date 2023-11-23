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
    //Funcion que borra lo que se esta mostrando
    //actualmente en la pagina
    if(("#textPresentation").length)
    {
        $(function()
        {
            setTimeout(function()
            {
                $(containerGeneral).remove();
            })
        });
    }


}

system.addEventListener("click", ()=>{
    if (containerGeneral.hasChildNodes()) {
        removedor();   
    } else {
        let greet = document.createElement("h4");
        greet.setAttribute("id", "greeting");
        greet.innerText = "Estimado Invitado Especial:";

        let quest = document.createElement("h4");
        quest.setAttribute("id", "questions");
        quest.innerText = "¿Aún no actualizas tu tarjeta?";

        let text = document.createElement("p");
        text.setAttribute("id", "texting");
        text.innerText = "No te preocupes, ven al Centro de " +
        "Atención al Invitado (CAI) o Descarga nuestra APP para"+
        " que puedas cambiar tu tarjeta y continúes disfrutando "+
        "los beneficios de ser Invitado Especial Cinemex.";
        
        let quest_1 = document.createElement("h4");
        quest_1.innerText = "¿Qué esperas?";
        let text_1 = document.createElement("p");
        text_1.innerText = "Tienes hasta el 31 de diciembre 2023."+
        " Gracias por seguir viviendo ¡La Magia del Cine en Cinemex!";
        
        containerGeneral.appendChild(greet);
        containerGeneral.appendChild(quest);
        containerGeneral.appendChild(text);
        containerGeneral.appendChild(quest_1);
        containerGeneral.appendChild(text_1);
        textPresentation.appendChild(containerGeneral);
    }
});

signup.addEventListener("click", ()=>{
    if(containerGeneral.hasChildNodes()){
        removedor();
    } else {
        let greet_S = document.createElement("h4");
        greet_S.innerText = "Estimado Invitado Especial:";
    
        let quest_S = document.createElement("h4");
        quest_S.innerText = "¿Aún no actualizas tu tarjeta?";
    
        let text_S = document.createElement("p");
        text_S.innerText = "No te preocupes, ven al Centro de " +
        "Atención al Invitado (CAI) o Descarga nuestra APP para"+
        " que puedas cambiar tu tarjeta y continúes disfrutando "+
        "los beneficios de ser Invitado Especial Cinemex.";
    
        containerGeneral.appendChild(greet_S);
        containerGeneral.appendChild(quest_S);
        containerGeneral.appendChild(text_S);
        textPresentation.appendChild(containerGeneral);
    }
    
});