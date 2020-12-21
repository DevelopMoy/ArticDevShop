const selCantidad= document.querySelectorAll(".cantidProdC");
const avisos=document.querySelector("#seccAvis");

for (let selector of selCantidad){
    selector.addEventListener ("change",()=>{
        const petic = new XMLHttpRequest();
        petic.onreadystatechange=()=>{
            if(petic.readyState===4&&petic.status===200){
                if(parseInt(selector.value)>parseInt(petic.responseText)){
                    avisos.innerHTML="No hay suficiente existencia, se ha modificado la cantidad al maximo de existencia";
                    selector.value=petic.responseText;
                }

                const peticion2 = new XMLHttpRequest();
                peticion2.onreadystatechange=()=>{
                    if(peticion2.readyState===4&&peticion2.status===200){
                        if (peticion2.responseText=="ok"){
                            avisos.innerHTML="todo ok";
                        }else{
                            avisos.innerHTML=peticion2.responseText;
                        }
                    }
                }
                peticion2.open("GET","../responses/veriffyCart.php?change="+selector.id+"&new="+selector.value,true);
                peticion2.send();
            }
        }
        petic.open("GET","../responses/veriffyCart.php?data="+selector.id,true);
        petic.send();
    });
}