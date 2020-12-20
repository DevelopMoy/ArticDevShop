const botonEnviar = document.querySelector("#botonCarrito");
if (botonEnviar){
    const idProd=document.querySelector("#idProduc");
    const cantidad=document.querySelector("#cantidad");
    const avisos=document.querySelector("#seccAvis");

    botonEnviar.addEventListener("click",()=>{
        let peticion = new XMLHttpRequest();
        peticion.onreadystatechange=()=>{
            if (peticion.readyState==4&&peticion.status==200){
                if (peticion.responseText=="errorBaseDatos"){
                    avisos.innerHTML="Ups! Ha ocurrido un error con el servidor, intentelo mas tarde";
                }else{
                    if (peticion.responseText=="errorCantidad"){
                        avisos.innerHTML="No hay suficientes productos de este tipo en el inventario";
                    }else{
                        avisos.innerHTML="Producto añadido al carrito";
                    }
                }
                setTimeout(()=>{avisos.innerHTML=""},3000);

            }
        }
        peticion.open("GET","../responses/agregarCarrito.php?prod="+idProd.innerHTML+"&cant="+cantidad.value,true);
        peticion.send();
    });
}
