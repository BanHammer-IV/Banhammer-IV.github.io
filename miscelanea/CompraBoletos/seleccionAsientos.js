let prueba = document.getElementById("prueba");

prueba.addEventListener("click", ()=>{
    if(prueba.classList.contains("prueba1")){
        prueba.classList.replace("prueba1", "prueba2");
    } else {
        prueba.classList.replace("prueba2", "prueba1");
    }
    
});