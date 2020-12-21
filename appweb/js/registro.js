const contr1 = document.querySelector("#contras");
const contr2 = document.querySelector("#contrasVer");
const avisos = document.querySelector("#avisos");
const emailVer = document.querySelector("#correo")
const botonRegis=document.querySelector("#botonRegist");

botonRegis.addEventListener("click",()=>{
    if (contr1.value==""||contr2.value==""||emailVer.value==""||document.querySelector("#nickname").value==""||document.querySelector("#nombre").value==""){
        avisos.innerHTML="Favor de llenar todos los campos";
    }else {
        if (contr1.value!=contr2.value){
            avisos.innerHTML="Las contraseñas deben coincidir!";
        }else{
            if (contr1.value.length<8){
                avisos.innerHTML="La longitud de la contraseña debe ser mayor a 8 caracteres";
            }else{
                //VALIDAR CON AJAX SI EXISTE EL CORREO
                const peticion = new XMLHttpRequest();
                peticion.open("GET","../responses/regValidation.php?mailUs="+emailVer.value.trim(),false);
                peticion.send();
                if (peticion.responseText=="true"){
                    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if (!re.test(emailVer.value.trim().toLowerCase())){
                        avisos.innerHTML="Favor de verificar el campo email";
                    }else{
                        document.querySelector("#formRegistro").submit();
                    }
                }else {
                    avisos.innerHTML="El usuario ya ha sido previamente registrado, intente con otro email"+emailVer.value;
                }
            }
        }
    }
});


