const botonesRadio=document.querySelectorAll(".pag");
const areaTarjeta = document.querySelector("#pagoBanco").cloneNode(true);
const areaOxxo=document.querySelector("#pagoOxxo").cloneNode(true);

document.querySelector("#pagoOxxo").remove();

for (let boton of botonesRadio){
    boton.addEventListener("change",()=>{
        if(document.querySelector("#pagTarj").checked==true){
            document.querySelector("#parteTarjetV").removeChild(document.querySelector("#pagoOxxo"));
            document.querySelector("#parteTarjetV").insertBefore(areaTarjeta.cloneNode(true),document.querySelector("#datosDomicil"));
        }else{
            document.querySelector("#parteTarjetV").removeChild(document.querySelector("#pagoBanco"));
            document.querySelector("#parteTarjetV").insertBefore(areaOxxo.cloneNode(true),document.querySelector("#datosDomicil"));
        }
    });
}
