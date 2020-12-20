const botones = document.querySelectorAll(".botonCupon");

for (let boton of botones){
    boton.addEventListener ("click",()=>{
       boton.innerHTML="Tu cupón: "+boton.id;
       boton.style.transform="scale(1.4)";
    });
}